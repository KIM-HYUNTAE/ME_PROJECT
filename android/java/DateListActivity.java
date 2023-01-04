package com.example.myapplication;

import static com.example.myapplication.LoginActivity.user_id;
import server_info;

import android.app.Activity;
import android.app.DatePickerDialog;
import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.DatePicker;
import android.widget.ListAdapter;
import android.widget.ListView;
import android.widget.Toast;

import androidx.annotation.Nullable;

import java.io.BufferedReader;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.net.HttpURLConnection;
import java.net.URL;
import java.util.Calendar;

public class DateListActivity extends Activity {
    public static String selected_date;
    Calendar c1 = Calendar.getInstance();
    Calendar c2 = Calendar.getInstance();

    private Button bdate, adate;
    String date1, date2;
    int Year2, Month2, Day2;
    String [] date_data={ };

    @Override
    protected void onCreate(@Nullable Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.datelist);

        bdate = (Button)findViewById(R.id.before_date);
        adate = (Button)findViewById(R.id.after_date);
        Button searchbtn = (Button) findViewById(R.id.search_btn);
        ListView listview = (ListView)findViewById(R.id.listView);

        int Year1 = c1.get(Calendar.YEAR);
        int Month1 = c1.get(Calendar.MONTH);
        int Day1 = c1.get(Calendar.DAY_OF_MONTH);
        Year2 = c2.get(Calendar.YEAR);
        Month2 = c2.get(Calendar.MONTH);
        Day2 = c2.get(Calendar.DAY_OF_MONTH);

        DatePickerDialog dpDialog1 = new DatePickerDialog(this, new DatePickerDialog.OnDateSetListener() {
            @Override
            public void onDateSet(DatePicker view, int year, int month, int dayOfMonth) {
                bdate.setText(year+ "-"  + (month+1)  + "-" +  dayOfMonth);
            }
        }, Year1, Month1, Day1);

        DatePickerDialog dpDialog2 = new DatePickerDialog(this, new DatePickerDialog.OnDateSetListener() {
            @Override
            public void onDateSet(DatePicker view, int year, int month, int dayOfMonth) {
                adate.setText(year+ "-"  + (month+1)  + "-" + dayOfMonth);
            }
        }, Year2, Month2, Day2);

        bdate.setOnClickListener(new View.OnClickListener(){
            public void onClick(View view){
                dpDialog1.show();
            }
        });

        adate.setOnClickListener(new View.OnClickListener(){
            public void onClick(View view){
                dpDialog2.show();
            }
        });

        searchbtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                date1= (String) bdate.getText();
                date2 =(String)adate.getText();
                try {
                    String result;
                    data_request task = new data_request();
                    result = task.execute(user_id,date1,date2).get();
                    Log.v("test","test: "+result);

                    date_data = result.split(",");
                    showlist(date_data, listview);

                } catch (Exception e) {
                    e.printStackTrace();
                }
            }

        });
    }
    void showlist(String[] list, ListView v){
        //adapter생성
        ListAdapter adapter = new ArrayAdapter<String>(this, android.R.layout.simple_list_item_1, list);

        //adapter 을 listview에 지정
        v.setAdapter(adapter);

        //listview의 item클릭시 이벤트처리
        v.setOnItemClickListener(
                new AdapterView.OnItemClickListener(){
                    @Override
                    public void onItemClick(AdapterView<?> parent, View view, int position, long id) {
                        selected_date=list[position];
                        Log.v("test","ssss: "+selected_date+" / "+position);
                        Intent intent=new Intent(getApplicationContext(), GraphActivity.class);
                        startActivity(intent);
                        /*String item = String.valueOf(parent.getItemAtPosition(position));
                        Toast.makeText(DateListActivity.this,item,Toast.LENGTH_SHORT).show();*/
                    }
                }
        );
    }

    class data_request extends AsyncTask<String, Void, String> {
        String sendMsg;
        String serverip = "http://"+ip+"/5027/WEB-main/android/date_view.php";

        @Override
        protected String doInBackground(String... strings) {
            try {
                URL url = new URL(serverip);
                sendMsg = "id=" + user_id
                        + "&date1=" + date1
                        +"&date2=" + date2;

                Log.v("test2","dddddd"+sendMsg);

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
