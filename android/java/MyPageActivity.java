package com.example.myapplication;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

import androidx.annotation.Nullable;

public class MyPageActivity extends Activity {
    @Override
    protected void onCreate(@Nullable Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.mypage);

        Button w_btn = (Button)findViewById(R.id.withdrawal_btn);
        w_btn.setOnClickListener(new View.OnClickListener(){
            public void onClick(View v){
                Intent intent=new Intent(getApplicationContext(), WithdrawalActivity.class);
                startActivity(intent);
            }
        });
        Button c_btn = (Button)findViewById(R.id.change_btn);
        c_btn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent=new Intent(getApplicationContext(), Info_modify1Activity.class);
                startActivity(intent);
            }
        });
    }
}
