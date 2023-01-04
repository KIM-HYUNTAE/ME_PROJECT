package com.example.myapplication;

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

public class FindIDActivity extends Activity {
    EditText inputname, inputphone;
    Button sendbtn, okbtn;
    String searchedID;

    public void showDialog(View view) {
        AlertDialog.Builder builder = new AlertDialog.Builder(this);
        builder.setTitle("실패").setMessage("아이디가 존재하지 않습니다.");
        AlertDialog ad = builder.create();
        ad.show();
    }

    public void show_Dialog(View view, String message_string) {
        AlertDialog.Builder builder = new AlertDialog.Builder(this);
        builder.setTitle("성공").setMessage(message_string);
        AlertDialog ad = builder.create();
        ad.show();
    }

    @Override
    protected void onCreate(@Nullable Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.findid);

        sendbtn = findViewById(R.id.search_btn);

        sendbtn.setOnClickListener(new View.OnClickListener() {
            public void onClick(View v) {
                inputname = findViewById(R.id.name_search);
                inputphone = findViewById(R.id.phone_search);

                String Name = inputname.getText().toString();
                String Phone=inputphone.getText().toString();

                try {
                    String result;
                    t_t task = new t_t();
                    result = task.execute(Name, Phone).get();
                    Log.v("test", "test: " + result);
                    int i=0;
                    int start=0, end=0;
                    while(i<result.length()){
                        if('!'==result.charAt(i)){
                            start=i;
                        }
                        else if('#'==result.charAt(i)){
                            end=i;
                        }
                        i++;
                    };
                    String id="";
                    int len=end-start+1;
                    for (int j=start+1; j<start+len/2 ;j++){
                        id=id+result.charAt(j);
                    }
                    for (int j=0; j<len-len/2; j++){
                        id=id+"*";
                    }

                    if (result.contains("searched!")) {
                        show_Dialog(v, id);
                    } else {
                        showDialog(v);
                    }
                } catch (Exception e) {
                    e.printStackTrace();
                }
            }
        });
        okbtn = findViewById(R.id.ok_btn);

        okbtn.setOnClickListener(new View.OnClickListener() {
            public void onClick(View v) {
                Intent intent = new Intent(getApplicationContext(), LoginActivity.class);
                startActivity(intent);
            }
        });

    }

    class t_t extends AsyncTask<String, Void, String> {
        String sendMsg;
        String serverip = "http://" + ip + "/5015/testfolder/search_id.php";
        ProgressDialog progressDialog;
        String errorString = null;

        @Override
        protected void onPreExecute() {
            super.onPreExecute();
            // Php 와 연동중에 데이터 읽을 때 까지 프로그래스바 출력
            progressDialog = ProgressDialog.show(FindIDActivity.this,
                    null, "해당 ID 조회중 ...", true, true);
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

                String name = (String) strings[0];
                String phone = (String) strings[1];

                sendMsg = "name=" + name + "&phone=" + phone;

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

