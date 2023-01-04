package com.example.myapplication;

import static com.example.myapplication.LoginActivity.user_id;

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
import server_info;

import androidx.annotation.Nullable;

import java.io.BufferedReader;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.net.HttpURLConnection;
import java.net.URL;

public class WithdrawalActivity extends Activity {
    public void show_Dialog(View view,String msg){
        if(msg.equals("ok")){
            AlertDialog.Builder builder = new AlertDialog.Builder(this);
            builder.setTitle("탈퇴 성공").setMessage("회원탈퇴에 성공하였습니다.");
            AlertDialog ad = builder.create();
            ad.show();
        }
        AlertDialog.Builder builder = new AlertDialog.Builder(this);
        builder.setTitle("탈퇴 실패").setMessage("비밀번호가 다릅니다.");
        AlertDialog ad = builder.create();
        ad.show();
    }

    protected void onCreate(@Nullable Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.withdrawal);
        Button s_btn = (Button) findViewById(R.id.submit);
        s_btn.setOnClickListener(new View.OnClickListener() {
            public void onClick(View v) {
                EditText pw = (EditText) findViewById(R.id.wpw);
                String pwd = pw.getText().toString();
                Log.d("test", "pw: " + pwd);
                try {
                    String result;
                    ttt task = new ttt();
                    result = task.execute(user_id,pwd).get();
                    Log.d("test", "result: " + result);

                    if (result.contains("ok")) {
                        show_Dialog(v,"ok");
                        Intent intent = new Intent(getApplicationContext(), MainActivity.class);
                        startActivity(intent);
                    }
                    else {
                        show_Dialog(v,"no");
                        Intent intent = new Intent(getApplicationContext(), WithdrawalActivity.class);
                        startActivity(intent);
                    }
                } catch (Exception e) {
                    e.printStackTrace();
                }
            }
        });
    }
    class ttt extends AsyncTask<String, Void, String> {
        String sendMsg;
        String serverip = "http://" + ip + "/5027/WEB-main/android/withdrawal.php";
        ProgressDialog progressDialog;
        String errorString = null;

        @Override
        protected void onPreExecute() {
            super.onPreExecute();
            // Php 와 연동중에 데이터 읽을 때 까지 프로그래스바 출력
            progressDialog = ProgressDialog.show(WithdrawalActivity.this,
                    null, "탈퇴 중 ...", true, true);
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

                String id = (String) strings[0];
                String pw = (String) strings[1];

                sendMsg = "id=" + id + "&pw=" + pw;

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
