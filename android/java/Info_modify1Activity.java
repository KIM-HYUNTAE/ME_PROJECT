package com.example.myapplication;

import static com.example.myapplication.LoginActivity.user_id;

import android.app.Activity;
import android.app.AlertDialog;
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

public class Info_modify1Activity  extends Activity {
    public static String pass_word;

    public void showDialog1(View view)  {
        AlertDialog.Builder builder = new AlertDialog.Builder(this);
        builder.setTitle("실패").setMessage("비밀번호를 다시 입력해주세요");
        AlertDialog ad = builder.create();
        ad.show();
    }
    @Override
    protected void onCreate(@Nullable Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.info_modify_1);

        //Button check_btn = (Button)findViewById(R.id.check_btn) ;
        EditText editText1 = (EditText)findViewById(R.id.m_pw);

        Button edit_btn = (Button)findViewById(R.id.m_edit_btn);

        edit_btn.setOnClickListener(new View.OnClickListener(){
            public void onClick(View v){
                pass_word = editText1.getText().toString();

                try {
                    String result;
                    Log.v("aaaa","aaaa");

                    check_pw task = new check_pw();
                    result = task.execute(user_id, pass_word).get();
                    Log.v("test","test: "+result);

                    if(result.contains("okay!")){
                        Intent intent=new Intent(getApplicationContext(),Info_modify2Activity.class);
                        startActivity(intent);
                    }
                    else{
                        showDialog1(v);
                    }
                } catch (Exception e) {
                    e.printStackTrace();
                }

                }
        }) ;
    }

    class check_pw extends AsyncTask<String, Void, String> {
        String sendMsg;
        String serverip = "http://" + ip + "/5027/WEB-main/android/pwd_check.php";

        @Override
        protected String doInBackground(String... strings) {
            try {
                URL url = new URL(serverip);
                sendMsg = "id=" + user_id
                        + "&pw=" + pass_word;

                Log.v("test2", "dddd____" + sendMsg);

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
