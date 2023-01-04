package com.example.myapplication;

import android.app.Activity;
import android.app.AlertDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

import androidx.annotation.Nullable;

public class MenuActivity extends Activity {
    @Override
    protected void onCreate(@Nullable Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.menu);

        Button inputbtn = (Button)findViewById(R.id.input_btn);
        inputbtn.setOnClickListener(new View.OnClickListener(){
            public void onClick(View v){
                Intent intent=new Intent(getApplicationContext(), Input0Activity.class);
                startActivity(intent);
            }
        });

        Button resultbtn = (Button)findViewById(R.id.result_btn);
        resultbtn.setOnClickListener(new View.OnClickListener(){
            public void onClick(View v){
                Intent intent=new Intent(getApplicationContext(), ResultActivity.class);
                startActivity(intent);
            }
        });

        Button mypagebtn = (Button)findViewById(R.id.mypage_btn);
        mypagebtn.setOnClickListener(new View.OnClickListener(){
            public void onClick(View v){
                Intent intent=new Intent(getApplicationContext(), MyPageActivity.class);
                startActivity(intent);
            }
        });

        Button helpbtn = (Button)findViewById(R.id.help_btn);
        helpbtn.setOnClickListener(new View.OnClickListener(){
            public void onClick(View v){
                Intent intent=new Intent(getApplicationContext(), HelpActivity.class);
                startActivity(intent);
            }
        });
        AlertDialog.Builder alert_ex = new AlertDialog.Builder(this);
        Button logoutbtn = (Button)findViewById(R.id.logout_btn);
        logoutbtn.setOnClickListener(new View.OnClickListener(){
            public void onClick(View v){
                alert_ex.setMessage("정말로 로그아웃하시겠습니까?");

                alert_ex.setNegativeButton("취소", new DialogInterface.OnClickListener() {
                    @Override
                    public void onClick(DialogInterface dialog, int which) {
                        // 내용(취소시 할 일이 없기 때문에 아무일도 하지 않게 아무것도 적지않았습니다)
                    }
                });
                alert_ex.setPositiveButton("로그아웃", new DialogInterface.OnClickListener() {
                    @Override
                    public void onClick(DialogInterface dialog, int which) {
                        //login 세션 연결 되면 종료될 수 있도록!
                        finishAffinity();
                    }
                });
                alert_ex.setTitle("Logout!");
                AlertDialog alert = alert_ex.create();
                alert.show();
            }
        });


    }
}
