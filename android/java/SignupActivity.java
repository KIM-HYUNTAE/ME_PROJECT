package com.example.myapplication;

import android.app.Activity;
import android.app.AlertDialog;
import android.app.ProgressDialog;
import android.content.Intent;
import android.graphics.Point;
import android.os.AsyncTask;
import android.os.Bundle;
import android.provider.MediaStore;
import android.util.Log;
import android.view.Display;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.RadioButton;
import android.widget.RadioGroup;
import android.widget.SeekBar;
import android.widget.TableLayout;
import android.widget.TextView;
import server_info;

import androidx.annotation.Nullable;
import androidx.constraintlayout.widget.ConstraintLayout;

import org.w3c.dom.Text;

import java.io.BufferedReader;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.net.HttpURLConnection;
import java.net.URL;
import java.nio.charset.StandardCharsets;
import java.text.SimpleDateFormat;
import java.util.Calendar;
import java.util.Date;
import java.util.Locale;

public class SignupActivity extends Activity {
    static String e, n, f, j;
    static String sex;

    public void showDialog(View view){
        AlertDialog.Builder builder = new AlertDialog.Builder(this);
        builder.setTitle("실패").setMessage("비밀번호가 다릅니다.");
        AlertDialog ad = builder.create();
        ad.show();
    }

    public void show_Dialog(View view){
        AlertDialog.Builder builder = new AlertDialog.Builder(this);
        builder.setTitle("실패").setMessage("이미 존재하는 아이디입니다.\n다른 아이디를 입력해주세요.");
        AlertDialog ad = builder.create();
        ad.show();
    }

    public void sDialog(View view, String msg, String type){
        if(type.equals("id")){
            if(msg.equals("ok")){
                AlertDialog.Builder builder = new AlertDialog.Builder(this);
                builder.setTitle("성공").setMessage("사용가능한 아이디입니다");
                AlertDialog ad = builder.create();
                ad.show();
            }
            else if(msg.equals("no")){
                AlertDialog.Builder builder = new AlertDialog.Builder(this);
                builder.setTitle("실패").setMessage("중복된 아이디 입니다. 다른 아이디를 입력해주세요.");
                AlertDialog ad = builder.create();
                ad.show();
            }
        }
        else if(type.equals("email")){
            if(msg.equals("ok")){
                AlertDialog.Builder builder = new AlertDialog.Builder(this);
                builder.setTitle("성공").setMessage("사용가능한 이메일입니다");
                AlertDialog ad = builder.create();
                ad.show();
            }
            else if(msg.equals("no")){
                AlertDialog.Builder builder = new AlertDialog.Builder(this);
                builder.setTitle("실패").setMessage("중복된 이메일 입니다. 다른 이메일을 입력해주세요.");
                AlertDialog ad = builder.create();
                ad.show();
            }
        }
        else if(type.equals("phone")){
            if(msg.equals("ok")){
                AlertDialog.Builder builder = new AlertDialog.Builder(this);
                builder.setTitle("성공").setMessage("사용가능한 휴대폰 번호입니다");
                AlertDialog ad = builder.create();
                ad.show();
            }
            else if(msg.equals("no")){
                AlertDialog.Builder builder = new AlertDialog.Builder(this);
                builder.setTitle("실패").setMessage("이미 사용중인 휴대폰 번호 입니다. 다른 휴대폰 번호를 입력해주세요.");
                AlertDialog ad = builder.create();
                ad.show();
            }
        }
        else if(type.equals("sign_up")){
            if(msg.equals("no")){
                AlertDialog.Builder builder = new AlertDialog.Builder(this);
                builder.setTitle("실패").setMessage("필수 정보를 입력하고 다시 시도해주세요.");
                AlertDialog ad = builder.create();
                ad.show();
            }
        }
    }

    static boolean checked_id = false;
    static boolean checked_email = false;
    static boolean checked_phone = false;

    @Override
    protected void onCreate(@Nullable Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.signup);

        Display display = getWindowManager().getDefaultDisplay();
        Point size=new Point();
        display.getSize(size);

        int width=size.x;
        int height=size.y;

        TableLayout s_b=(TableLayout)findViewById(R.id.sign_table);
        /*변경하고 싶은 레이아웃의 파라미터 값을 가져 옴*/
        ConstraintLayout.LayoutParams param = (ConstraintLayout.LayoutParams) s_b.getLayoutParams();
        /*해당 margin값 변경*/
        param.topMargin = height/20;
        param.bottomMargin=height/20;
        param.rightMargin=width/20;
        param.leftMargin=width/20;

        s_b.setLayoutParams(param);

        SeekBar seekBar1 = (SeekBar) findViewById(R.id.seekBar1);
        SeekBar seekBar2 = (SeekBar) findViewById(R.id.seekBar2);
        SeekBar seekBar3 = (SeekBar) findViewById(R.id.seekBar3);
        SeekBar seekBar4 = (SeekBar) findViewById(R.id.seekBar4);

        TextView t_e = (TextView) findViewById(R.id.text_E);
        TextView t_i = (TextView) findViewById(R.id.text_I);
        TextView t_n = (TextView) findViewById(R.id.text_N);
        TextView t_s = (TextView) findViewById(R.id.text_S);
        TextView t_t = (TextView) findViewById(R.id.text_T);
        TextView t_f = (TextView) findViewById(R.id.text_F);
        TextView t_p = (TextView) findViewById(R.id.text_P);
        TextView t_j = (TextView) findViewById(R.id.text_J);

        Button btn1 = (Button) findViewById(R.id.chk_id_button);
        btn1.setOnClickListener(new View.OnClickListener() {
            public void onClick(View v) {
                EditText id1 = (EditText)findViewById(R.id.id_text);
                String id=id1.getText().toString();
                Log.d("test", "id_check_result1: " + id);

                try {
                    String result;
                    id_check ic = new id_check();

                    result = ic.execute(id).get();
                    Log.d("test", "id_check_result2: " + result);

                    if (result.contains("ok1")) {
                        checked_id = true;
                        sDialog(v,"ok","id");
                    } else if(result.contains("no1")){
                        sDialog(v,"no","id");
                    }
                } catch (Exception e) {
                    e.printStackTrace();
                }

            }
        });

        Button btn2 = (Button) findViewById(R.id.chk_email_button);
        btn2.setOnClickListener(new View.OnClickListener() {
            public void onClick(View v) {
                EditText email1 = (EditText)findViewById(R.id.EmailAddress);
                String email=email1.getText().toString();
                try {
                    String result;
                    email_check ie = new email_check();
                    result = ie.execute(email).get();
                    Log.d("test", "email_check_result1: " + email);
                    Log.d("test", "email_check_result2: " + result);

                    if (result.contains("ok2")) {
                        checked_email = true;
                        sDialog(v,"ok","email");
                    } else if(result.contains("no2")){
                        sDialog(v,"no","email");
                    }
                } catch (Exception e) {
                    e.printStackTrace();
                }
            }
        });

        Button btn3 = (Button) findViewById(R.id.chk_phone_button);
        btn3.setOnClickListener(new View.OnClickListener() {
            public void onClick(View v) {
                EditText phone1 = (EditText)findViewById(R.id.editTextPhone);
                String phone=phone1.getText().toString();
                try {
                    String result;
                    phone_check ip = new phone_check();
                    result = ip.execute(phone).get();
                    Log.d("test", "phone_check_result1: " + phone);
                    Log.d("test", "phone_check_result2: " + result);

                    if (result.contains("ok3")) {
                        checked_phone = true;
                        sDialog(v,"ok","phone");
                    } else if(result.contains("no3")){
                        sDialog(v,"no","phone");
                    }
                } catch (Exception e) {
                    e.printStackTrace();
                }
            }
        });

        // OnSeekBarChange 리스너 - Seekbar 값 변경시 이벤트처리 Listener
        seekBar1.setOnSeekBarChangeListener(new SeekBar.OnSeekBarChangeListener() {
            @Override
            public void onProgressChanged(SeekBar seekBar, int progress, boolean fromUser) {
                t_e.setText(String.format("%d", seekBar.getProgress()));
                t_i.setText(String.format("%d", (100 - seekBar.getProgress())));
            }

            @Override
            public void onStartTrackingTouch(SeekBar seekBar) {
                t_e.setText(String.format("%d", seekBar.getProgress()));
                t_i.setText(String.format("%d", (100 - seekBar.getProgress())));
            }

            @Override
            public void onStopTrackingTouch(SeekBar seekBar) {
                t_e.setText(String.format("%d", seekBar.getProgress()));
                e = String.format("%d", seekBar.getProgress());
                t_i.setText(String.format("%d", (100 - seekBar.getProgress())));
            }
        });
        // OnSeekBarChange 리스너 - Seekbar 값 변경시 이벤트처리 Listener
        seekBar2.setOnSeekBarChangeListener(new SeekBar.OnSeekBarChangeListener() {
            @Override
            public void onProgressChanged(SeekBar seekBar, int progress, boolean fromUser) {
                t_n.setText(String.format("%d", seekBar.getProgress()));
                n = String.format("%d", seekBar.getProgress());
                t_s.setText(String.format("%d", (100 - seekBar.getProgress())));
            }

            @Override
            public void onStartTrackingTouch(SeekBar seekBar) {
                t_n.setText(String.format("%d", seekBar.getProgress()));
                t_s.setText(String.format("%d", (100 - seekBar.getProgress())));
            }

            @Override
            public void onStopTrackingTouch(SeekBar seekBar) {
                t_n.setText(String.format("%d", seekBar.getProgress()));
                t_s.setText(String.format("%d", (100 - seekBar.getProgress())));
            }
        });

        // OnSeekBarChange 리스너 - Seekbar 값 변경시 이벤트처리 Listener
        seekBar3.setOnSeekBarChangeListener(new SeekBar.OnSeekBarChangeListener() {
            @Override
            public void onProgressChanged(SeekBar seekBar, int progress, boolean fromUser) {
                t_f.setText(String.format("%d", seekBar.getProgress()));
                t_t.setText(String.format("%d", (100 - seekBar.getProgress())));
            }

            @Override
            public void onStartTrackingTouch(SeekBar seekBar) {
                t_f.setText(String.format("%d", seekBar.getProgress()));
                t_t.setText(String.format("%d", (100 - seekBar.getProgress())));
            }

            @Override
            public void onStopTrackingTouch(SeekBar seekBar) {
                t_f.setText(String.format("%d", seekBar.getProgress()));
                f = String.format("%d", seekBar.getProgress());
                t_t.setText(String.format("%d", (100 - seekBar.getProgress())));
            }
        });

        // OnSeekBarChange 리스너 - Seekbar 값 변경시 이벤트처리 Listener
        seekBar4.setOnSeekBarChangeListener(new SeekBar.OnSeekBarChangeListener() {
            @Override
            public void onProgressChanged(SeekBar seekBar, int progress, boolean fromUser) {
                t_j.setText(String.format("%d", seekBar.getProgress()));
                t_p.setText(String.format("%d", (100 - seekBar.getProgress())));
            }

            @Override
            public void onStartTrackingTouch(SeekBar seekBar) {
                t_j.setText(String.format("%d", seekBar.getProgress()));
                t_p.setText(String.format("%d", (100 - seekBar.getProgress())));
            }

            @Override
            public void onStopTrackingTouch(SeekBar seekBar) {
                t_j.setText(String.format("%d", seekBar.getProgress()));
                j = String.format("%d", seekBar.getProgress());
                t_p.setText(String.format("%d", (100 - seekBar.getProgress())));
            }
        });


        Button s_btn = (Button) findViewById(R.id.submission);
        s_btn.setOnClickListener(new View.OnClickListener() {
            public void onClick(View v) {
                String name;
                String id;
                String email;
                String phone;
                String pwd;
                String pwd1;
                String age;
                EditText Name = (EditText)findViewById(R.id.name);
                name=Name.getText().toString();

                EditText ID = (EditText) findViewById(R.id.id_text);
                id = ID.getText().toString();

                EditText Email = (EditText) findViewById(R.id.EmailAddress);
                email = Email.getText().toString();

                EditText Pnum = (EditText) findViewById(R.id.editTextPhone);
                phone = Pnum.getText().toString();

                EditText pw = (EditText) findViewById(R.id.TextPassword);
                pwd = pw.getText().toString();

                EditText AGE = (EditText) findViewById(R.id.editTextDate);
                age = AGE.getText().toString();


                RadioButton male = (RadioButton)findViewById(R.id.male);
                RadioButton female = (RadioButton)findViewById(R.id.female);

                if(male.isChecked()){
                    sex = "male";
                }else if(female.isChecked()){
                    sex = "female";
                }

                EditText pw1 = (EditText) findViewById(R.id.TextPassword2);
                pwd1 = pw1.getText().toString();

                if(pwd.equals(pwd1)){
                    try {
                        String result;
                        String i_m_result;
                        ttt task = new ttt();
                        insert_mbti m = new insert_mbti();

                        result = task.execute(name, id, pwd, age, sex, phone, email).get();
                        Log.d("test", "result: " + result);
                        i_m_result = m.execute(id,e,n,f,j).get();
                        Log.d("test", "insert_mbti: "+ i_m_result);

                        if (result.contains("sign_up")) {
                            if(checked_email==true && checked_id==true && checked_phone == true) {
                                Intent intent = new Intent(getApplicationContext(), LoginActivity.class);
                                startActivity(intent);
                            }
                            else {
                                sDialog(v,"sign_up","no");

                            }
                        } else if(result.contains("입력하세요")){
                            show_Dialog(v);
                        }
                        else {
                            if(checked_email==true && checked_id==true && checked_phone == true) {
                                Intent intent = new Intent(getApplicationContext(), LoginActivity.class);
                                startActivity(intent);
                            }
                            else {
                                sDialog(v,"sign_up","no");

                            }
                        }
                    } catch (Exception e) {
                        e.printStackTrace();
                    }
                }
                else {
                    showDialog(v);
                }
            }

        });
    }


    class insert_mbti extends AsyncTask<String, Void, String> {
        String sendMsg;
        String serverip = "http://" + ip + "/5027/WEB-main/android/insert_mbti.php";
        ProgressDialog progressDialog;
        String errorString = null;

        @Override
        protected String doInBackground(String... strings) {
            try {
                URL url = new URL(serverip);

                String id = (String) strings[0];
                String ei = (String) strings[1];
                String ns = (String) strings[2];
                String ft = (String) strings[3];
                String jp = (String) strings[4];

                sendMsg = "id=" + id + "&ei=" + ei + "&ns=" + ns + "&ft=" + ft + "&jp=" + jp;

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

    class id_check extends AsyncTask<String, Void, String> {
        String sendMsg;
        String serverip = "http://" + ip + "/5027/WEB-main/android/check_validiation.php";
        ProgressDialog progressDialog;
        String errorString = null;

        @Override
        protected String doInBackground(String... strings) {
            try {
                URL url = new URL(serverip);

                String id = (String) strings[0];

                sendMsg = "type=id" + "&id=" + id;

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

    class email_check extends AsyncTask<String, Void, String> {
        String sendMsg;
        String serverip = "http://" + ip + "/5027/WEB-main/android/check_validiation.php";
        ProgressDialog progressDialog;
        String errorString = null;

        @Override
        protected String doInBackground(String... strings) {
            try {
                URL url = new URL(serverip);

                String email = (String) strings[0];
                Log.d("test", "email_check_result3: " + email);

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

    class phone_check extends AsyncTask<String, Void, String> {
        String sendMsg;
        String serverip = "http://" + ip + "/5027/WEB-main/android/check_validiation.php";
        ProgressDialog progressDialog;
        String errorString = null;

        @Override
        protected String doInBackground(String... strings) {
            try {
                URL url = new URL(serverip);

                String phone = (String) strings[0];

                sendMsg = "type=phone" + "&phone=" + phone;

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

    class ttt extends AsyncTask<String, Void, String> {
        String sendMsg;
        String serverip = "http://" + ip + "/5027/WEB-main/member/member_signup_check.php";
        ProgressDialog progressDialog;
        String errorString = null;

        @Override
        protected void onPreExecute() {
            super.onPreExecute();
            // Php 와 연동중에 데이터 읽을 때 까지 프로그래스바 출력
            progressDialog = ProgressDialog.show(SignupActivity.this,
                    null, "회원가입 중 ...", true, true);
        }

        @Override
        protected void onPostExecute(String result) {
            super.onPostExecute(result);
            progressDialog.dismiss();
            if (result == null) {
                // 연결 실패시 예외처리
                //user_err.setText("서버가 불안정합니다.");
            } else {
            }
        }

        @Override
        protected String doInBackground(String... strings) {
            try {
                URL url = new URL(serverip);

                String name_put = (String) strings[0];
                //name.getBytes(StandardCharsets.UTF_8);
                String id_put = (String) strings[1];
                String pw_put = (String) strings[2];
                String age_put = (String) strings[3];
                String sex_put = (String) strings[4];
                String phone_put = (String) strings[5];
                String email_put = (String) strings[6];

                sendMsg = "name=" + name_put + "&id=" + id_put + "&pw=" + pw_put + "&age=" + age_put + "&sex=" + sex_put + "&phone=" + phone_put + "&email=" + email_put;

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
}