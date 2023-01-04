package com.example.myapplication;

import android.os.AsyncTask;
import android.util.Log;
import server_info;

import java.io.BufferedInputStream;
import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.io.OutputStreamWriter;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.ProtocolException;
import java.net.URL;
import java.net.URLConnection;


public class Task extends AsyncTask<String, Void, String>{
    String sendMsg;
    String serverip = "http://"+ip+"/5015/data_insert.php"; // 연결할 jsp주소


    @Override
    protected String doInBackground(String... strings) {
        String sendMsg;
        String serverip = "http://"+ip+"/5015/data_insert.php"; // 연결할 jsp주소

        try {
            URL url = new URL(serverip);

            String c1 = (String) strings[0];
            String c2 = (String) strings[1];
            String c3 = (String) strings[2];
            String c4 = (String) strings[3];
            String c5 = (String) strings[4];
            String c6 = (String) strings[5];
            String c7 = (String) strings[6];
            String c8 = (String) strings[7];
            String c9 = (String) strings[8];
            String c10 = (String) strings[9];
            String c11 = (String) strings[10];
            String c12 = (String) strings[11];
            String c13 = (String) strings[12];
            String c14 = (String) strings[13];
            String c15 = (String) strings[14];
            String c16 = (String) strings[15];
            String c17 = (String) strings[16];
            String c18 = (String) strings[17];
            String c19 = (String) strings[18];
            String c20 = (String) strings[19];
            String c21 = (String) strings[20];
            String c22 = (String) strings[21];
            String c23 = (String) strings[22];
            String c24 = (String) strings[23];



            sendMsg = "c1=" + c1 + "&c2=" + c2 + "&c3=" + c3 + "&c4=" + c4 + "&c5=" + c5 + "&c6=" + c6 + "&c7=" + c7+ "&c8=" + c8 + "&c9=" + c9 + "&c10=" + c10 + "&c11=" + c11 + "&c12=" + c12 + "&c13=" + c13 + "&c14=" + c14 + "&c15=" + c15 +"&c16=" + c16 + "&c17=" + c17+ "&c18=" + c18 + "&c19=" + c19 + "&c20=" + c20 + "&c21=" + c21 + "&c22=" + c22 + "&c23=" + c23 + "&c24=" + c24;

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