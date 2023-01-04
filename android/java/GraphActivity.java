package com.example.myapplication;

import static com.example.myapplication.DateListActivity.selected_date;
import static com.example.myapplication.LoginActivity.user_id;
import server_info;
import android.app.Activity;
import android.app.AlertDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.graphics.Color;
import android.os.AsyncTask;
import android.os.Bundle;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.Window;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.TextView;

import androidx.annotation.Nullable;

import com.github.mikephil.charting.charts.LineChart;
import com.github.mikephil.charting.components.Description;
import com.github.mikephil.charting.components.XAxis;
import com.github.mikephil.charting.components.YAxis;
import com.github.mikephil.charting.data.Entry;
import com.github.mikephil.charting.data.LineData;
import com.github.mikephil.charting.data.LineDataSet;

import java.io.BufferedReader;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.net.HttpURLConnection;
import java.net.URL;
import java.util.ArrayList;
import java.util.List;

public class GraphActivity extends Activity {
    private LineChart lineChart;
    static int c_data[] = new int[24];

    protected void onCreate(@Nullable Bundle savedInstanceState) {
        setContentView(R.layout.graph);
//        for(int i = 0; i < 24; i++){
//            c_data[i] = i + 1;
//        }

                try {
                    String result;
                    data_request task = new data_request();
                    result = task.execute(user_id, selected_date).get();
                    Log.v("test","test: "+result);
                    String [] c_data_s = result.split(", ");
                    try{
                        for(int i = 0; i < 24; i++) {
                            c_data[i] = Integer.parseInt(c_data_s[i]);
                            Log.v("data_test","current: "+c_data[i]);
                        }

                        TextView sleep = (TextView) findViewById(R.id.sleep);
                        sleep.setText(c_data_s[24]);

                        TextView body = (TextView) findViewById(R.id.body);
                        body.setText(c_data_s[25]);

                        TextView smoke = (TextView) findViewById(R.id.smoking);
                        switch(c_data_s[26]){
                            case "0":
                                smoke.setText("비흡연");
                                break;
                            case "1":
                                smoke.setText("흡연");
                                break;
                        }

                        TextView drink = (TextView) findViewById(R.id.drink_);
                        switch(c_data_s[27]){
                            case "0":
                                drink.setText("음주하지않음");
                                break;
                            case "1":
                                drink.setText("적당한 음주");
                                break;
                            case "2":
                                drink.setText("과음");
                        }

                        for(int i = 24; i < 28; i++){
                            Log.v("data_test","condition: "+c_data_s[i]);
                        }
                    }
                    catch (NumberFormatException ex){
                        ex.printStackTrace();
                    }

                } catch (Exception e) {
                    e.printStackTrace();
                }
        lineChart = (LineChart)findViewById(R.id.ch);

        List<Entry> entries = new ArrayList<>();
        //entries.add(new Entry(1, 1));


        entries.add(new Entry(1, c_data[0]));
        entries.add(new Entry(2, c_data[1]));
        entries.add(new Entry(3, c_data[2]));
        entries.add(new Entry(4, c_data[3]));
        entries.add(new Entry(5, c_data[4]));
        entries.add(new Entry(6, c_data[5]));
        entries.add(new Entry(7, c_data[6]));
        entries.add(new Entry(8, c_data[7]));
        entries.add(new Entry(9, c_data[8]));
        entries.add(new Entry(10, c_data[9]));
        entries.add(new Entry(11, c_data[10]));
        entries.add(new Entry(12, c_data[11]));
        entries.add(new Entry(13, c_data[12]));
        entries.add(new Entry(14, c_data[13]));
        entries.add(new Entry(15, c_data[14]));
        entries.add(new Entry(16, c_data[15]));
        entries.add(new Entry(17, c_data[16]));
        entries.add(new Entry(18, c_data[17]));
        entries.add(new Entry(19, c_data[18]));
        entries.add(new Entry(20, c_data[19]));
        entries.add(new Entry(21, c_data[20]));
        entries.add(new Entry(22, c_data[21]));
        entries.add(new Entry(23, c_data[22]));
        entries.add(new Entry(24, c_data[23]));

        LineDataSet lineDataSet = new LineDataSet(entries, "전류데이터");
        lineDataSet.setLineWidth(2);
        lineDataSet.setCircleRadius(3);
        lineDataSet.setCircleColor(Color.parseColor("#FFA1B4DC"));
        lineDataSet.setCircleColor(Color.BLUE);
        lineDataSet.setColor(Color.parseColor("#FFA1B4DC"));
        lineDataSet.setDrawCircleHole(true);
        lineDataSet.setDrawCircles(true);
        lineDataSet.setDrawHorizontalHighlightIndicator(false);
        lineDataSet.setDrawHighlightIndicators(false);
        lineDataSet.setDrawValues(false);

        LineData lineData = new LineData(lineDataSet);
        lineChart.setData(lineData);

        XAxis xAxis = lineChart.getXAxis();
        xAxis.setPosition(XAxis.XAxisPosition.BOTTOM);
        xAxis.setTextColor(Color.BLACK);
        xAxis.enableGridDashedLine(8, 24, 0);

        YAxis yLAxis = lineChart.getAxisLeft();
        yLAxis.setTextColor(Color.BLACK);

        YAxis yRAxis = lineChart.getAxisRight();
        yRAxis.setDrawLabels(false);
        yRAxis.setDrawAxisLine(false);
        yRAxis.setDrawGridLines(false);

        Description description = new Description();
        description.setText("");

        lineChart.setDoubleTapToZoomEnabled(false);
        lineChart.setDrawGridBackground(false);
        lineChart.setDescription(description);
        //lineChart.animateY(2000, Easing.EasingOption.EaseInCubic);
        lineChart.invalidate();
        //dialog.show();
        //ImageView image = (ImageView) dialog.findViewById(R.id.lung_pic);
        super.onCreate(savedInstanceState);



    }

    class data_request extends AsyncTask<String, Void, String> {
        String sendMsg;
        String serverip = "http://"+ip+"/5027/WEB-main/android/data_view.php";

        @Override
        protected String doInBackground(String... strings) {
            try {
                URL url = new URL(serverip);
                sendMsg = "id=" + user_id
                        + "&date=" + selected_date;

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
