package com.example.myapplication;

import static com.example.myapplication.LoginActivity.user_id;
import server_info;

import android.app.Activity;
import android.app.AlertDialog;
import android.app.ProgressDialog;
import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;

import androidx.annotation.Nullable;

import java.io.BufferedReader;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.net.HttpURLConnection;
import java.net.URL;
import java.util.concurrent.ExecutionException;

public class Info_modify2Activity extends Activity {
    String name, email, phone, age, pw;
    boolean ck_email=false, ck_phone=false;
    String c_e, c_p;

    @Override
    protected void onCreate(@Nullable Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.info_modify_2);

        view_info view = new view_info();
        String result_info;
        EditText m_name = (EditText) findViewById(R.id.m_name);
        EditText m_email = (EditText) findViewById(R.id.m_EmailAddress);
        EditText m_phone = (EditText) findViewById(R.id.m_editTextPhone);
        EditText m_birth = (EditText) findViewById(R.id.m_editTextDate);
        //EditText m_mbti = (EditText) findViewById(R.id.m_mbti);

        EditText m_bpw = (EditText) findViewById(R.id.m_TextPassword);
        EditText m_pw = (EditText) findViewById(R.id.m_TextPassword2);
        EditText pw_check = (EditText) findViewById(R.id.m_TextPassword3);


        try {
            result_info = view.execute(user_id).get();
            result_info.split(", ");
            String[] info_arr = result_info.split(", ");
            m_name.setText(info_arr[0]);
            m_email.setText(info_arr[1]);
            m_phone.setText(info_arr[2]);
            m_birth.setText(info_arr[3]);
            m_bpw.setText(info_arr[4]);
            m_pw.setText(info_arr[4]);
            pw_check.setText(info_arr[4]);

            c_e=info_arr[1];
            c_p=info_arr[2];
        } catch (ExecutionException e) {
            e.printStackTrace();
        } catch (InterruptedException e) {
            e.printStackTrace();
        }

        Button check_email = (Button) findViewById(R.id.m_email_btn);
        Button check_phone = (Button) findViewById(R.id.m_phone_btn);
        Button submit_btn = (Button) findViewById(R.id.submission);

        check_email.setOnClickListener(new View.OnClickListener() {
            public void onClick(View v) {
                String c_email = m_email.getText().toString();
                try {
                    String result;
                    email__check ttt = new email__check();
                    result = ttt.execute(c_email).get();
                    Log.v("test", "email: " + email+"~~~"+ result);

                    if (result.contains("ok2")) {
                        ck_email=true;
                        email=c_email;
                        showDialog_check_p(v);
                    } else if(result.contains("no2")){
                        showDialog_check_n(v);
                    }
                } catch (Exception e) {
                    e.printStackTrace();
                }
            }
        });

        check_phone.setOnClickListener(new View.OnClickListener(){
            public void onClick(View v) {
                String c_phone = m_phone.getText().toString();
                try {
                    String result;
                    phone__check task = new phone__check();
                    result = task.execute(c_phone).get();
                    Log.v("test", "phone: " +phone+"~~~"+ result);
                    if (result.contains("ok3")) {
                        ck_phone=true;
                        showDialog_check_p(v);
                    } else if (result.contains("no3")) {
                        showDialog_check_n(v);
                    }
                } catch (Exception e) {
                    e.printStackTrace();
                }
            }
        });

        submit_btn.setOnClickListener(new View.OnClickListener(){
            public void onClick(View v){
                name=m_name.getText().toString();
                email=m_email.getText().toString();
                phone=m_phone.getText().toString();
                pw=m_pw.getText().toString();
                age=m_birth.getText().toString();

                String bpw = m_bpw.getText().toString();
                String check = pw_check.getText().toString();
                if(email.equals(c_e))
                    ck_email=true;
                if(phone.equals(c_p))
                    ck_phone=true;

                if(ck_email==true&&ck_phone==true && bpw.equals(pw) && pw.equals(check)){
                        try {
                            String result;
                            edit_info ta_sk = new edit_info();

                            result = ta_sk.execute(user_id, pw, email, phone,age, name).get();
                            Log.v("t_e_st","test:  "+result);
                            if(result.contains("OK")){
                                showDialog_p(v);
                                Intent intent=new Intent(getApplicationContext(),MenuActivity.class);
                                startActivity(intent);
                            }
                            else{
                                showDialog_password(v);
                            }
                        } catch (Exception e) {
                            e.printStackTrace();
                        }
                    }
                else{
                    showDialog_password(v);
                }
                Log.v("input","input =="+name+email+phone+pw+age);
            }
        });
        }
    class view_info extends AsyncTask<String, Void, String> {
        String sendMsg;
        String serverip = "http://" + ip + "/5027/WEB-main/android/view_info.php";
        String errorString = null;

        @Override
        protected String doInBackground(String... strings) {
            try {
                URL url = new URL(serverip);

                String id = (String) strings[0];


                sendMsg = "id=" + id;

                HttpURLConnection httpURLConnection = (HttpURLConnection) url.openConnection();


                //httpURLConnection.setReadTimeout(5000);
                //httpURLConnection.setConnectTimeout(5000);
                httpURLConnection.setRequestMethod("POST");
                httpURLConnection.connect();


                OutputStream outputStream = httpURLConnection.getOutputStream();
                outputStream.write(sendMsg.getBytes("UTF-8"));
                outputStream.flush();
                outputStream.close();


                int responseStatusCode = httpURLConnection.getResponseCode();
                //Log.d(TAG, "POST response code - " + responseStatusCode);

                InputStream inputStream;
                if (responseStatusCode == HttpURLConnection.HTTP_OK) {
                    inputStream = httpURLConnection.getInputStream();
                } else {
                    inputStream = httpURLConnection.getErrorStream();
                }

                InputStreamReader inputStreamReader = new InputStreamReader(inputStream, "UTF-8");
                BufferedReader bufferedReader = new BufferedReader(inputStreamReader);

                StringBuilder sb = new StringBuilder();
                String line = null;

                while ((line = bufferedReader.readLine()) != null) {
                    sb.append(line);
                }

                bufferedReader.close();

                return sb.toString();

            } catch (Exception e) {
                //Log.d(TAG, "InsertData: Error ", e);
                return new String("Error: " + e.getMessage());
            }

        }

    }
    class email__check extends AsyncTask<String, Void, String> {
        String sendMsg;
        String serverip = "http://" + ip + "/5027/WEB-main/android/check_validiation.php";
        ProgressDialog progressDialog;
        String errorString = null;

        @Override
        protected String doInBackground(String... strings) {
            try {
                URL url = new URL(serverip);

                sendMsg = "type=email" + "&email=" + email;

                HttpURLConnection httpURLConnection = (HttpURLConnection) url.openConnection();


                //httpURLConnection.setReadTimeout(5000);
                //httpURLConnection.setConnectTimeout(5000);
                httpURLConnection.setRequestMethod("POST");
                httpURLConnection.connect();


                OutputStream outputStream = httpURLConnection.getOutputStream();
                outputStream.write(sendMsg.getBytes("UTF-8"));
                outputStream.flush();
                outputStream.close();


                int responseStatusCode = httpURLConnection.getResponseCode();
                //Log.d(TAG, "POST response code - " + responseStatusCode);

                InputStream inputStream;
                if (responseStatusCode == HttpURLConnection.HTTP_OK) {
                    inputStream = httpURLConnection.getInputStream();
                } else {
                    inputStream = httpURLConnection.getErrorStream();
                }

                InputStreamReader inputStreamReader = new InputStreamReader(inputStream, "UTF-8");
                BufferedReader bufferedReader = new BufferedReader(inputStreamReader);

                StringBuilder sb = new StringBuilder();
                String line = null;

                while ((line = bufferedReader.readLine()) != null) {
                    sb.append(line);
                }

                bufferedReader.close();

                return sb.toString();

            } catch (Exception e) {
                //Log.d(TAG, "InsertData: Error ", e);
                return new String("Error: " + e.getMessage());
            }
        }
    }
    class phone__check extends AsyncTask<String, Void, String> {
        String sendMsg;
        String serverip = "http://" + ip + "/5027/WEB-main/android/check_validiation.php";
        String errorString = null;

        @Override
        protected String doInBackground(String... strings) {
            try {
                URL url = new URL(serverip);
                sendMsg = "type=phone" + "&phone=" +phone;

                HttpURLConnection httpURLConnection = (HttpURLConnection) url.openConnection();

                //httpURLConnection.setReadTimeout(5000);
                //httpURLConnection.setConnectTimeout(5000);
                httpURLConnection.setRequestMethod("POST");
                httpURLConnection.connect();

                OutputStream outputStream = httpURLConnection.getOutputStream();
                outputStream.write(sendMsg.getBytes("UTF-8"));
                outputStream.flush();
                outputStream.close();

                int responseStatusCode = httpURLConnection.getResponseCode();
                //Log.d(TAG, "POST response code - " + responseStatusCode);

                InputStream inputStream;
                if (responseStatusCode == HttpURLConnection.HTTP_OK) {
                    inputStream = httpURLConnection.getInputStream();
                } else {
                    inputStream = httpURLConnection.getErrorStream();
                }

                InputStreamReader inputStreamReader = new InputStreamReader(inputStream, "UTF-8");
                BufferedReader bufferedReader = new BufferedReader(inputStreamReader);

                StringBuilder sb = new StringBuilder();
                String line = null;

                while ((line = bufferedReader.readLine()) != null) {
                    sb.append(line);
                }
                bufferedReader.close();
                return sb.toString();
            } catch (Exception e) {
                //Log.d(TAG, "InsertData: Error ", e);
                return new String("Error: " + e.getMessage());
            }
        }
    }

    class edit_info extends AsyncTask<String, Void, String> {
        String sendMsg;
        //String serverip = "http://" + ip + "/5027/WEB-main/android/info_edit.php";
        String serverip = "http://" + ip + "/5027/WEB-main/android/info_edit.php";
        @Override
        protected String doInBackground(String... strings) {
            try {
                URL url = new URL(serverip);
                sendMsg = "id=" + user_id
                        + "&pw=" + pw
                        + "&email="+email
                        + "&phone="+phone
                        + "&age="+age
                        + "&name="+name;

                Log.v("test3", "d___2   " + sendMsg);

                HttpURLConnection httpURLConnection = (HttpURLConnection) url.openConnection();

                //httpURLConnection.setReadTimeout(5000);
                //httpURLConnection.setConnectTimeout(5000);
                httpURLConnection.setRequestMethod("POST");
                httpURLConnection.connect();

                OutputStream outputStream = httpURLConnection.getOutputStream();
                outputStream.write(sendMsg.getBytes("UTF-8"));
                outputStream.flush();
                outputStream.close();

                int responseStatusCode = httpURLConnection.getResponseCode();
                //Log.d(TAG, "POST response code - " + responseStatusCode);
                InputStream inputStream;

                if (responseStatusCode == HttpURLConnection.HTTP_OK) {
                    inputStream = httpURLConnection.getInputStream();
                } else {
                    inputStream = httpURLConnection.getErrorStream();
                }

                InputStreamReader inputStreamReader = new InputStreamReader(inputStream, "UTF-8");
                BufferedReader bufferedReader = new BufferedReader(inputStreamReader);
                StringBuilder sb = new StringBuilder();
                String line = null;
                while ((line = bufferedReader.readLine()) != null) {
                    sb.append(line);
                }
                bufferedReader.close();
                return sb.toString();
            } catch (Exception e) {
                //Log.d(TAG, "InsertData: Error ", e);
                return new String("Error: " + e.getMessage());
            }
        }
    }
    public void showDialog_check_p(View view) {
        AlertDialog.Builder builder = new AlertDialog.Builder(this);
        builder.setTitle("성공").setMessage("확인되었습니다.");
        AlertDialog ad = builder.create();
        ad.show();
    }
    public void showDialog_check_n(View view) {
        AlertDialog.Builder builder = new AlertDialog.Builder(this);
        builder.setTitle("실패").setMessage("이미 존재합니다. \n다시 입력해주세요.");
        AlertDialog ad = builder.create();
        ad.show();
    }
    public void showDialog_password(View view) {
        AlertDialog.Builder builder = new AlertDialog.Builder(this);
        builder.setTitle("실패").setMessage("비밀번호 입력이 잘못되었습니다.\n다시 입력해주세요.");
        AlertDialog ad = builder.create();
        ad.show();
    }
    public void showDialog_p(View view) {
        AlertDialog.Builder builder = new AlertDialog.Builder(this);
        builder.setTitle("수정 성공").setMessage("수정에 성공하였습니다.");
        AlertDialog ad = builder.create();
        ad.show();
    }
    public void showDialog_n(View view) {
        AlertDialog.Builder builder = new AlertDialog.Builder(this);
        builder.setTitle("수정 실패").setMessage("수정에 실패하였습니다.");
        AlertDialog ad = builder.create();
        ad.show();
    }
}