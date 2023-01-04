package com.example.myapplication;

import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.app.AppCompatDelegate;

import android.app.Activity;
import android.app.AlertDialog;
import android.app.ProgressDialog;
import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.icu.text.IDNA;
import android.os.AsyncTask;
import android.os.Bundle;
import android.preference.PreferenceManager;
import android.text.TextUtils;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.CheckBox;
import android.widget.EditText;
import android.widget.Toast;
import server_info;

import java.io.BufferedReader;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.net.HttpURLConnection;
import java.net.URL;
import java.text.SimpleDateFormat;
import java.util.Date;

public class LoginActivity extends Activity {
    public static String user_id;
    String pwd;
    public void showDialog(View view)
    {
        AlertDialog.Builder builder = new AlertDialog.Builder(this);
        builder.setTitle("실패").setMessage("로그인 실패.");
        AlertDialog ad = builder.create();
        ad.show();
    }
    @Override
    protected void onCreate(Bundle savedInstanceState) {

        super.onCreate(savedInstanceState);
        setContentView(R.layout.login);
        AppCompatDelegate.setDefaultNightMode(AppCompatDelegate.MODE_NIGHT_NO);

        Button login_btn = (Button)findViewById(R.id.loginbtn);
        login_btn.setOnClickListener(new View.OnClickListener(){
            public void onClick(View v){
                EditText editText1 = (EditText)findViewById(R.id.id);
                String id = editText1.getText().toString();

                EditText editText2 = (EditText)findViewById(R.id.pw);
                pwd = editText2.getText().toString();

                try {
                    user_id=id;
                    String result;
                    tttt task = new tttt();
                    result = task.execute(id,pwd).get();
                    if(result.contains("ok")){
                        Log.v("test","test: "+result);
                        Intent intent=new Intent(getApplicationContext(), MenuActivity.class);
                        startActivity(intent);
                        finish();
                    }
                    else{
                        showDialog(v);
                    }
                } catch (Exception e) {
                    e.printStackTrace();
                }
            }
        });


    }
    class tttt extends AsyncTask<String, Void, String> {
        String sendMsg;
        String serverip = "http://"+ip+"/5027/WEB-main/member/member_login_check.php";
        ProgressDialog progressDialog;
        String errorString = null;

        @Override
        protected void onPreExecute() {
            super.onPreExecute();
            // Php 와 연동중에 데이터 읽을 때 까지 프로그래스바 출력
            progressDialog = ProgressDialog.show(LoginActivity.this,
                    null, "로그인 중 ...", true, true);
        }

        @Override
        protected void onPostExecute(String result) {
            super.onPostExecute(result);
            progressDialog.dismiss();
            //Log.d(TAG, "response - " + result);
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

                sendMsg = "id="+user_id+"&pw="+pwd;

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