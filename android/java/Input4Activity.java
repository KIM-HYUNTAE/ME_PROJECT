package com.example.myapplication;

import android.app.Activity;
import android.app.AlertDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.graphics.Point;
import android.os.AsyncTask;
import android.os.Bundle;
import android.util.Log;
import android.view.Display;
import android.view.Gravity;
import android.view.LayoutInflater;
import android.view.View;
import android.view.Window;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.PopupWindow;
import android.widget.TextView;
import android.widget.Toast;
import server_info;

import androidx.annotation.Nullable;
import androidx.constraintlayout.widget.ConstraintLayout;

import java.io.BufferedReader;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.net.HttpURLConnection;
import java.net.URL;
import java.text.SimpleDateFormat;
import java.util.Date;

public class Input4Activity extends Activity {
    public static String[] sto = new String[30];
    private PopupWindow mPopupWindow ;

    protected void onCreate(@Nullable Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.input4);

        Display display = getWindowManager().getDefaultDisplay();
        ImageView iv = (ImageView) findViewById(R.id.right2);
        Point size = new Point();
        display.getSize(size);

        int width = size.x;
        int height = size.y;

        iv.getLayoutParams().height = height / 3;

        Button b4 = (Button) findViewById(R.id.before4);
        b4.setOnClickListener(new View.OnClickListener() {
            public void onClick(View v) {
                Intent intent = new Intent(getApplicationContext(), Input3Activity.class);
                startActivity(intent);
            }
        });

        LinearLayout l_b = (LinearLayout) findViewById(R.id.layout4_btn);

        /*변경하고 싶은 레이아웃의 파라미터 값을 가져 옴*/
        ConstraintLayout.LayoutParams params = (ConstraintLayout.LayoutParams) l_b.getLayoutParams();
        /*해당 margin값 변경*/
        params.topMargin = height / 20;

        l_b.setLayoutParams(params);

        TextView t8 = (TextView) findViewById(R.id.text8);

        t8.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                show(8);
            }
        });

        TextView t9 = (TextView) findViewById(R.id.text9);

        t9.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                show(9);
            }
        });

        TextView t10 = (TextView) findViewById(R.id.text10);

        t10.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                show(10);
            }
        });

        TextView t11 = (TextView) findViewById(R.id.text11);

        t11.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                show(11);
            }
        });

        TextView t12 = (TextView) findViewById(R.id.text12);

        t12.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                show(12);
            }
        });

        Button finish = (Button) findViewById(R.id.finish);
        finish.setOnClickListener(new View.OnClickListener() {
            public void onClick(View v) {

                EditText editText1 = (EditText) findViewById(R.id.r7);
                String c7 = editText1.getText().toString();

                EditText editText2 = (EditText) findViewById(R.id.r8);
                String c8 = editText2.getText().toString();

                EditText editText3 = (EditText) findViewById(R.id.r9);
                String c9 = editText3.getText().toString();

                EditText editText4 = (EditText) findViewById(R.id.r10);
                String c10 = editText4.getText().toString();

                EditText editText5 = (EditText) findViewById(R.id.r11);
                String c11 = editText5.getText().toString();

                EditText editText6 = (EditText) findViewById(R.id.r12);
                String c12 = editText6.getText().toString();


                sto[18] = c7;
                sto[19] = c8;
                sto[20] = c9;
                sto[21] = c10;
                sto[22] = c11;
                sto[23] = c12;
                try {
                    Log.v("test", "ttttest: c1: " + sto[0] + " c24: " + sto[23] + " input date: " + sto[29] + " userid: " + sto[24]);
                    Log.v("sss","sss"+sto[25]+ sto[26]+ sto[27]+ sto[28]+ sto[29]);
                    tttt task = new tttt();
                    //task.execute(c7,c8,c9,c10,c11,c12,c7,c8,c9,c10,c11,c12,c7,c8,c9,c10,c11,c12,c7,c8,c9,c10,c11,c12);
                    String re = task.execute(sto[0], sto[1], sto[2], sto[3], sto[4], sto[5], sto[6], sto[7], sto[8], sto[9], sto[10], sto[11], sto[12], sto[13], sto[14], sto[15], sto[16], sto[17], sto[18], sto[19], sto[20], sto[21], sto[22], sto[23], sto[24], sto[25], sto[26], sto[27], sto[28], sto[29]).get();
                    Log.v("test", "query: " + re);
                } catch (Exception e) {
                    e.printStackTrace();
                }
                View popupView = getLayoutInflater().inflate(R.layout.dialog_activity, null);
                mPopupWindow = new PopupWindow(popupView, LinearLayout.LayoutParams.WRAP_CONTENT, LinearLayout.LayoutParams.WRAP_CONTENT);
                //popupView 에서 (LinearLayout 을 사용) 레이아웃이 둘러싸고 있는 컨텐츠의 크기 만큼 팝업 크기를 지정

                mPopupWindow.setFocusable(true);
                // 외부 영역 선택히 PopUp 종료
                mPopupWindow.showAtLocation(popupView, Gravity.CENTER, 0, 0);

                Button cancel = (Button) popupView.findViewById(R.id.cancel);
                cancel.setOnClickListener(new View.OnClickListener() {
                    @Override
                    public void onClick(View v) {
                        Toast.makeText(getApplicationContext(), "입력칸으로 이동합니다", Toast.LENGTH_SHORT).show();
                        Intent intent = new Intent(getApplicationContext(), Input0Activity.class);
                        startActivity(intent);
                    }
                });

                Button ok = (Button) popupView.findViewById(R.id.okay);
                ok.setOnClickListener(new View.OnClickListener() {
                    @Override
                    public void onClick(View v) {
                        Toast.makeText(getApplicationContext(), "완료되었습니다", Toast.LENGTH_SHORT).show();
                        Intent intent = new Intent(getApplicationContext(), MenuActivity.class);
                        startActivity(intent);
                    }
                });
            }
        });
    }
    void show(int i){
        AlertDialog.Builder builder = new AlertDialog.Builder(this);

        builder.setNegativeButton("확인",
                new DialogInterface.OnClickListener() {
                    public void onClick(DialogInterface dialog, int which) {
                        //Toast.makeText(getApplicationContext(),"완료",Toast.LENGTH_LONG).show();
                    }
                });
        AlertDialog dialog = builder.create();
        LayoutInflater inflater = getLayoutInflater();

        switch (i){
            case 8:
                View dialogLayout1 = inflater.inflate(R.layout.pop_8, null);
                dialog.setView(dialogLayout1);
                dialog.requestWindowFeature(Window.FEATURE_NO_TITLE);

                dialog.getWindow().setBackgroundDrawable(null);

                dialog.show();
                ImageView image = (ImageView) dialog.findViewById(R.id.lung_pic);
                break;
            case 9:
                View dialogLayout3 = inflater.inflate(R.layout.pop_9, null);
                dialog.setView(dialogLayout3);
                dialog.requestWindowFeature(Window.FEATURE_NO_TITLE);

                dialog.getWindow().setBackgroundDrawable(null);

                dialog.show();
                ImageView image3 = (ImageView) dialog.findViewById(R.id.heart_pic);
                break;
            case 10:
                View dialogLayout4 = inflater.inflate(R.layout.pop_10, null);
                dialog.setView(dialogLayout4);
                dialog.requestWindowFeature(Window.FEATURE_NO_TITLE);

                dialog.getWindow().setBackgroundDrawable(null);

                dialog.show();
                ImageView image4 = (ImageView) dialog.findViewById(R.id.liver_pic);
                break;
            case 11:
                View dialogLayout5 = inflater.inflate(R.layout.pop_11, null);
                dialog.setView(dialogLayout5);
                dialog.requestWindowFeature(Window.FEATURE_NO_TITLE);

                dialog.getWindow().setBackgroundDrawable(null);

                dialog.show();
                ImageView image5 = (ImageView) dialog.findViewById(R.id.spleen_pic);
                break;
            case 12:
                View dialogLayout6 = inflater.inflate(R.layout.pop_12, null);
                dialog.setView(dialogLayout6);
                dialog.requestWindowFeature(Window.FEATURE_NO_TITLE);

                dialog.getWindow().setBackgroundDrawable(null);

                dialog.show();
                ImageView image6 = (ImageView) dialog.findViewById(R.id.stomach_pic);
                break;
        }
    }
    class tttt extends AsyncTask<String, Void, String> {
        String sendMsg;
        String serverip = "http://"+ip+"/5027/WEB-main/android/current_input.php";

        @Override
        protected String doInBackground(String... strings) {
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
                String name = (String) strings[24];
                String sleep = (String) strings[25];
                String feel = (String) strings[26];
                String smoke = (String) strings[27];
                String drink = (String) strings[28];
                //String time = (String) strings[29];
                String time = sto[29];

/*                SimpleDateFormat formatter = new SimpleDateFormat("yyyy-mm-dd HH24:MI:SS");
                Date date=formatter.parse(time);
                time=date.toString();*/

                Log.v("date","date:   "+time+"current24: "+c24);

                sendMsg = "current1=" + c1
                        + "&current2=" + c2
                        + "&current3=" + c3
                        + "&current4=" + c4
                        + "&current5=" + c5
                        + "&current6=" + c6
                        + "&current7=" + c7
                        + "&current8=" + c8
                        + "&current9=" + c9
                        + "&current10=" + c10
                        + "&current11=" + c11
                        + "&current12=" + c12
                        + "&current13=" + c13
                        + "&current14=" + c14
                        + "&current15=" + c15
                        + "&current16=" + c16
                        + "&current17=" + c17
                        + "&current18=" + c18
                        + "&current19=" + c19
                        + "&current20=" + c20
                        + "&current21=" + c21
                        + "&current22=" + c22
                        + "&current23=" + c23
                        + "&current24=" + c24
                        + "&id=" +name
                        + "&sleep=" +sleep
                        + "&body=" +feel
                        + "&smoke=" + smoke
                        + "&drink=" + drink
                        + "&dateTime=" + time;
                Log.v("sendMSG", "msg:  "+sendMsg);

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