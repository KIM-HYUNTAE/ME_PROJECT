package com.example.myapplication;

import android.app.Activity;
import android.app.AlertDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.graphics.Point;
import android.os.Bundle;
import android.util.Log;
import android.view.Display;
import android.view.Gravity;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.view.Window;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.TableLayout;
import android.widget.TextView;

import androidx.annotation.Nullable;
import androidx.appcompat.app.AppCompatActivity;
import androidx.constraintlayout.widget.ConstraintLayout;

public class Input1Activity extends Activity {
    @Override
    protected void onCreate(@Nullable Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.input1);

        Display display = getWindowManager().getDefaultDisplay();
        ImageView iv = (ImageView) findViewById(R.id.left1);
        Point size=new Point();
        display.getSize(size);

        int width=size.x;
        int height=size.y;

        iv.getLayoutParams().height=height/3;

        Button b1 = (Button)findViewById(R.id.before1);
        b1.setOnClickListener(new View.OnClickListener(){
            public void onClick(View v){
                Intent intent=new Intent(getApplicationContext(), Input0Activity.class);
                startActivity(intent);
            }
        });

        Button n1 = (Button)findViewById(R.id.next1);
        n1.setOnClickListener(new View.OnClickListener(){
            public void onClick(View v){
                EditText editText1 = (EditText)findViewById(R.id.l1);
                String c1 = editText1.getText().toString();

                EditText editText2 = (EditText)findViewById(R.id.l2);
                String c2 = editText2.getText().toString();

                EditText editText3 = (EditText)findViewById(R.id.l3);
                String c3 = editText3.getText().toString();

                EditText editText4 = (EditText)findViewById(R.id.l4);
                String c4 = editText4.getText().toString();

                EditText editText5 = (EditText)findViewById(R.id.l5);
                String c5 = editText5.getText().toString();

                EditText editText6 = (EditText)findViewById(R.id.l6);
                String c6 = editText6.getText().toString();
                try {
                    Input4Activity dt = new Input4Activity();
                    dt.sto[0] = c1;
                    dt.sto[1] = c2;
                    dt.sto[2] = c3;
                    dt.sto[3] = c4;
                    dt.sto[4] = c5;
                    dt.sto[5] = c6;
                    //dt.data_storage(6,c7, c8, c9, c10, c11, c12);
                } catch (Exception e) {
                    e.printStackTrace();
                }
                Intent intent=new Intent(getApplicationContext(), Input2Activity.class);
                startActivity(intent);
            }
        });

        LinearLayout l_b=(LinearLayout)findViewById(R.id.layout_btn1);

        /*변경하고 싶은 레이아웃의 파라미터 값을 가져 옴*/
        ConstraintLayout.LayoutParams params = (ConstraintLayout.LayoutParams) l_b.getLayoutParams();
        /*해당 margin값 변경*/
        params.topMargin = height/20;

        l_b.setLayoutParams(params);
/*
        TableLayout t_b=(TableLayout)findViewById(R.id.table_input);
        //변경하고 싶은 레이아웃의 파라미터 값을 가져 옴
        ConstraintLayout.LayoutParams param = (ConstraintLayout.LayoutParams) t_b.getLayoutParams();
        //해당 margin값 변경
        param.topMargin = height/17;

        t_b.setLayoutParams(param);
*/

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