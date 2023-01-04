package com.example.myapplication;

import static com.example.myapplication.LoginActivity.user_id;

import android.app.Activity;
import android.os.AsyncTask;
import android.os.Bundle;
import android.util.Log;
import android.widget.ProgressBar;
import android.widget.TextView;
import server_info;

import androidx.annotation.Nullable;

import java.io.BufferedReader;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.net.HttpURLConnection;
import java.net.URL;

public class MbtiActivity extends Activity {
    @Override
    protected void onCreate(@Nullable Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.mbti_result);

        TextView t_1 = (TextView) findViewById(R.id.my_mbti);
        TextView t_2 = (TextView) findViewById(R.id.elec_mbti);
        TextView per_text = (TextView) findViewById(R.id.percent_text);

        try {
            mbti_show task = new mbti_show();
            String mbti_s = task.execute(user_id).get();
            String[] mbti_arr = mbti_s.split(",");

            String my_mbti= mbti_arr[0];
            t_1.setText(my_mbti);

            String elec_mbti=mbti_arr[1];
            for (int i=2; i<mbti_arr.length; i++){
                    elec_mbti+="  /  "+mbti_arr[i];
            }
            t_2.setText(elec_mbti);

            String[] mbti=my_mbti.split("");
            //body_type 받아오기!!!!
            int body_type=3;
            int p = percent(mbti, body_type);
            Log.v("percent","pereee_____"+p);
            per_text.setText( "일치율: "+String.valueOf(p)+"%");

            ProgressBar progress = (ProgressBar) findViewById(R.id.progressBarCircle) ;
            progress.setProgress(p) ;

        }
        catch (Exception e){
            e.printStackTrace();
        }

    }
    class mbti_show extends AsyncTask<String, Void, String> {
        String sendMsg;
        String serverip = "http://"+ip+"/5027/WEB-main/android/mbti_result.php";

        @Override
        protected String doInBackground(String... strings) {
            try {
                URL url = new URL(serverip);
                sendMsg = "id=" + user_id;

                Log.v("mbti","dddddd"+sendMsg);

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

    int percent(String[] mbti, int body_type) {
        int max = 0;
        String[] type1 = {"ISTP", "ISTJ", "ESTP", "ESTJ"};
        String[] type2 = {"ENFJ", "ESFJ"};
        String[] type3 = {"INTJ", "INTP", "INFJ", "INFP"};
        String[] type4 = {"ENTJ", "ENTP", "ENFJ", "ENFP"};
        String[] type5 = {"INTJ", "ENTJ", "ISTJ", "ESTJ"};
        String[] type6 = {"ISTJ", "ISFJ"};
        String[] type7 = {"ENFP", "ESFP"};

        if (body_type == 1) {
            int count = 0;
            String[] t1 = type1[0].split("");
            for (int i = 1; i < t1.length; i++) {
                if (!mbti[i].equals(t1[i])) continue;
                count++;
            }
            count = count * 25;
            if (count > max) {
                max = count;
            }

            count = 0;
            String[] t2 = type1[1].split("");
            for (int i = 1; i < t2.length; i++) {
                if (!mbti[i].equals(t2[i])) continue;
                count++;
            }
            count = count * 25;
            if (count > max) {
                max = count;
            }

            count = 0;
            String[] t3 = type1[2].split("");
            for (int i = 1; i < t3.length; i++) {
                if (!mbti[i].equals(t3[i])) continue;
                count++;
            }
            count = count * 25;
            if (count > max) {
                max = count;
            }

            count = 0;
            String[] t4 = type1[3].split("");
            for (int i = 1; i < t4.length; i++) {
                if (!mbti[i].equals(t4[i])) continue;
                count++;
            }
            count = count * 25;
            if (count > max) {
                max = count;
            }
        } else if (body_type == 2) {
            int max1=0, max2=0;
            int count = 0;
            String[] t1 = type2[0].split("");
            for (int i = 1; i < t1.length; i++) {
                if (!mbti[i].equals(t1[i])) continue;
                count++;
            }
            Log.v("!!!count", String.valueOf(count));
            count = count * 25;
            if (count > max) {
                max = count;
            }

            count = 0;
            String[] t2 = type2[1].split("");
            for (int i = 1; i < t2.length; i++) {
                if (!mbti[i].equals(t2[i])) continue;
                count++;
            }
            count = count * 25;
            if (count > max) {
                max = count;
            }
        } else if (body_type == 3) {
            int count = 0;
            String[] t1 = type3[0].split("");
            for (int i = 1; i < t1.length; i++) {
                if (!mbti[i].equals(t1[i])) continue;
                count++;
            }
            count = count * 25;
            if (count > max) {
                max = count;
            }

            count = 0;
            String[] t2 = type3[1].split("");
            for (int i = 1; i < t2.length; i++) {
                if (!mbti[i].equals(t2[i])) continue;
                count++;
            }
            count = count * 25;
            if (count > max) {
                max = count;
            }

            count = 0;
            String[] t3 = type3[2].split("");
            for (int i = 1; i < t3.length; i++) {
                if (!mbti[i].equals(t3[i])) continue;
                count++;
            }
            count = count * 25;
            if (count > max) {
                max = count;
            }

            count = 0;
            String[] t4 = type3[3].split("");
            for (int i = 1; i < t4.length; i++) {
                if (!mbti[i].equals(t4[i])) continue;
                count++;
            }
            count = count * 25;
            if (count > max) {
                max = count;
            }
        } else if (body_type == 4) {
            int count = 0;
            String[] t1 = type4[0].split("");
            for (int i = 1; i < t1.length; i++) {
                if (!mbti[i].equals(t1[i])) continue;
                count++;
            }
            count = count * 25;
            if (count > max) {
                max = count;
            }

            count = 0;
            String[] t2 = type4[1].split("");
            for (int i = 1; i < t2.length; i++) {
                if (!mbti[i].equals(t2[i])) continue;
                count++;
            }
            count = count * 25;
            if (count > max) {
                max = count;
            }

            count = 0;
            String[] t3 = type4[2].split("");
            for (int i = 1; i < t3.length; i++) {
                if (!mbti[i].equals(t3[i])) continue;
                count++;
            }
            count = count * 25;
            if (count > max) {
                max = count;
            }

            count = 0;
            String[] t4 = type4[3].split("");
            for (int i = 1; i < t4.length; i++) {
                if (!mbti[i].equals(t4[i])) continue;
                count++;
            }
            count = count * 25;
            if (count > max) {
                max = count;
            }
        } else if (body_type == 5) {
            int count = 0;
            String[] t1 = type5[0].split("");
            for (int i = 1; i < t1.length; i++) {
                if (!mbti[i].equals(t1[i])) continue;
                count++;
            }
            count = count * 25;
            if (count > max) {
                max = count;
            }

            count = 0;
            String[] t2 = type5[1].split("");
            for (int i = 1; i < t2.length; i++) {
                if (!mbti[i].equals(t2[i])) continue;
                count++;
            }
            count = count * 25;
            if (count > max) {
                max = count;
            }

            count = 0;
            String[] t3 = type5[2].split("");
            for (int i = 1; i < t3.length; i++) {
                if (!mbti[i].equals(t3[i])) continue;
                count++;
            }
            count = count * 25;
            if (count > max) {
                max = count;
            }

            count = 0;
            String[] t4 = type5[3].split("");
            for (int i = 1; i < t4.length; i++) {
                if (!mbti[i].equals(t4[i])) continue;
                count++;
            }
            count = count * 25;
            if (count > max) {
                max = count;
            }
        } else if (body_type == 6) {
            int count = 0;
            String[] t1 = type6[0].split("");
            for (int i = 1; i < t1.length; i++) {
                if (!mbti[i].equals(t1[i])) continue;
                count++;
            }
            count = count * 25;
            if (count > max) {
                max = count;
            }

            count = 0;
            String[] t2 = type6[1].split("");
            for (int i = 1; i < t2.length; i++) {
                if (!mbti[i].equals(t2[i])) continue;
                count++;
            }
            count = count * 25;
            if (count > max) {
                max = count;
            }

            count = 0;
            String[] t3 = type6[2].split("");
            for (int i = 1; i < t3.length; i++) {
                if (!mbti[i].equals(t3[i])) continue;
                count++;
            }
            count = count * 25;
            if (count > max) {
                max = count;
            }

            count = 0;
            String[] t4 = type6[3].split("");
            for (int i = 1; i < t4.length; i++) {
                if (!mbti[i].equals(t4[i])) continue;
                count++;
            }
            count = count * 25;
            if (count > max) {
                max = count;
            }
        }
        return max;
    }
}
