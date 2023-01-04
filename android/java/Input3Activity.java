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

public class Input3Activity extends Activity {
    @Override
    protected void onCreate(@Nullable Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.input3);

        Display display = getWindowManager().getDefaultDisplay();
        ImageView iv = (ImageView) findViewById(R.id.right1);
        Point size=new Point();
        display.getSize(size);

        int width=size.x;
        int height=size.y;

        iv.getLayoutParams().height=height/3;

        Button b3 = (Button)findViewById(R.id.before3);
        b3.setOnClickListener(new View.OnClickListener(){
            public void onClick(View v){
                Intent intent=new Intent(getApplicationContext(), Input2Activity.class);
                startActivity(intent);
            }
        });

        Button n3 = (Button)findViewById(R.id.next3);
        n3.setOnClickListener(new View.OnClickListener(){
            public void onClick(View v){
                EditText editText1 = (EditText)findViewById(R.id.r1);
                String c1 = editText1.getText().toString();

                EditText editText2 = (EditText)findViewById(R.id.r2);
                String c2 = editText2.getText().toString();
                Log.v("test","test: "+c2);

                EditText editText3 = (EditText)findViewById(R.id.r3);
                String c3 = editText3.getText().toString();

                EditText editText4 = (EditText)findViewById(R.id.r4);
                String c4 = editText4.getText().toString();

                EditText editText5 = (EditText)findViewById(R.id.r5);
                String c5 = editText5.getText().toString();

                EditText editText6 = (EditText)findViewById(R.id.r6);
                String c6 = editText6.getText().toString();
                try {
                    Input4Activity dt = new Input4Activity();
                    dt.sto[12] = c1;
                    dt.sto[13] = c2;
                    dt.sto[14] = c3;
                    dt.sto[15] = c4;
                    dt.sto[16] = c5;
                    dt.sto[17] = c6;
                    //dt.data_storage(12,c1, c2, c3, c4, c5, c6);
                } catch (Exception e) {
                    e.printStackTrace();
                }
                Intent intent=new Intent(getApplicationContext(), Input4Activity.class);
                startActivity(intent);
            }
        });

        LinearLayout l_b=(LinearLayout)findViewById(R.id.layout_btn3);

        /*변경하고 싶은 레이아웃의 파라미터 값을 가져 옴*/
        ConstraintLayout.LayoutParams params = (ConstraintLayout.LayoutParams) l_b.getLayoutParams();
        /*해당 margin값 변경*/
        params.topMargin = height/20;

        l_b.setLayoutParams(params);

        TextView t1 = (TextView) findViewById(R.id.text1);

        t1.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                show(1);
            }
        });

        TextView t3 = (TextView) findViewById(R.id.text3);

        t3.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                show(3);
            }
        });

        TextView t4 = (TextView) findViewById(R.id.text4);

        t4.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                show(4);
            }
        });

        TextView t5 = (TextView) findViewById(R.id.text5);

        t5.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                show(5);
            }
        });

        TextView t6 = (TextView) findViewById(R.id.text6);

        t6.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                show(6);
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
            case 1:
                View dialogLayout1 = inflater.inflate(R.layout.pop_1, null);
                dialog.setView(dialogLayout1);
                dialog.requestWindowFeature(Window.FEATURE_NO_TITLE);

                dialog.getWindow().setBackgroundDrawable(null);

                dialog.show();
                ImageView image = (ImageView) dialog.findViewById(R.id.lung_pic);
                break;
            case 3:
                View dialogLayout3 = inflater.inflate(R.layout.pop_3, null);
                dialog.setView(dialogLayout3);
                dialog.requestWindowFeature(Window.FEATURE_NO_TITLE);

                dialog.getWindow().setBackgroundDrawable(null);

                dialog.show();
                ImageView image3 = (ImageView) dialog.findViewById(R.id.heart_pic);
                break;
            case 4:
                View dialogLayout4 = inflater.inflate(R.layout.pop_4, null);
                dialog.setView(dialogLayout4);
                dialog.requestWindowFeature(Window.FEATURE_NO_TITLE);

                dialog.getWindow().setBackgroundDrawable(null);

                dialog.show();
                ImageView image4 = (ImageView) dialog.findViewById(R.id.liver_pic);
                break;
            case 5:
                View dialogLayout5 = inflater.inflate(R.layout.pop_5, null);
                dialog.setView(dialogLayout5);
                dialog.requestWindowFeature(Window.FEATURE_NO_TITLE);

                dialog.getWindow().setBackgroundDrawable(null);

                dialog.show();
                ImageView image5 = (ImageView) dialog.findViewById(R.id.spleen_pic);
                break;
            case 6:
                View dialogLayout6 = inflater.inflate(R.layout.pop_6, null);
                dialog.setView(dialogLayout6);
                dialog.requestWindowFeature(Window.FEATURE_NO_TITLE);

                dialog.getWindow().setBackgroundDrawable(null);

                dialog.show();
                ImageView image6 = (ImageView) dialog.findViewById(R.id.stomach_pic);
                break;
        }
    }
}