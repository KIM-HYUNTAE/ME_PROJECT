package com.example.myapplication;

import android.app.Activity;
import android.app.AlertDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.graphics.Point;
import android.os.Bundle;
import android.util.Log;
import android.view.Display;
import android.view.LayoutInflater;
import android.view.View;
import android.view.Window;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.TextView;

import androidx.annotation.Nullable;
import androidx.constraintlayout.widget.ConstraintLayout;

public class Input2Activity extends Activity {
    @Override
    protected void onCreate(@Nullable Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.input2);

        Display display = getWindowManager().getDefaultDisplay();
        ImageView iv = (ImageView) findViewById(R.id.left2);
        Point size=new Point();
        display.getSize(size);

        int width=size.x;
        int height=size.y;

        iv.getLayoutParams().height=height/3;

        Button b2 = (Button)findViewById(R.id.before2);
        b2.setOnClickListener(new View.OnClickListener(){
            public void onClick(View v){
                Intent intent=new Intent(getApplicationContext(), Input1Activity.class);
                startActivity(intent);
            }
        });

        LinearLayout l_b=(LinearLayout)findViewById(R.id.layout2_btn);

        /*변경하고 싶은 레이아웃의 파라미터 값을 가져 옴*/
        ConstraintLayout.LayoutParams params = (ConstraintLayout.LayoutParams) l_b.getLayoutParams();
        /*해당 margin값 변경*/
        params.topMargin = height/20;

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

        Button n2 = (Button)findViewById(R.id.next2);
        n2.setOnClickListener(new View.OnClickListener(){
            public void onClick(View v){
                EditText editText1 = (EditText)findViewById(R.id.l7);
                String c7 = editText1.getText().toString();

                EditText editText2 = (EditText)findViewById(R.id.l8);
                String c8 = editText2.getText().toString();
                Log.v("test","test: "+c8);

                EditText editText3 = (EditText)findViewById(R.id.l9);
                String c9 = editText3.getText().toString();

                EditText editText4 = (EditText)findViewById(R.id.l10);
                String c10 = editText4.getText().toString();

                EditText editText5 = (EditText)findViewById(R.id.l11);
                String c11 = editText5.getText().toString();

                EditText editText6 = (EditText)findViewById(R.id.l12);
                String c12 = editText6.getText().toString();
                try {
                    Input4Activity dt = new Input4Activity();
                    dt.sto[6] = c7;
                    dt.sto[7] = c8;
                    dt.sto[8] = c9;
                    dt.sto[9] = c10;
                    dt.sto[10] = c11;
                    dt.sto[11] = c12;
                    //dt.data_storage(6,c7, c8, c9, c10, c11, c12);
                } catch (Exception e) {
                    e.printStackTrace();
                }
                Intent intent=new Intent(getApplicationContext(), Input3Activity.class);
                startActivity(intent);
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
}