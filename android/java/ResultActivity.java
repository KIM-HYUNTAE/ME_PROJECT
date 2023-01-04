package com.example.myapplication;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

import androidx.annotation.Nullable;

public class ResultActivity extends Activity {
    @Override
    protected void onCreate(@Nullable Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.result);

        Button g_btn = (Button)findViewById(R.id.graph_btn);
        g_btn.setOnClickListener(new View.OnClickListener(){
            public void onClick(View v){
                Intent intent=new Intent(getApplicationContext(), DateListActivity.class);
                startActivity(intent);
            }
        });

        Button c_btn = (Button)findViewById(R.id.classify_btn);
        c_btn.setOnClickListener(new View.OnClickListener(){
            public void onClick(View v){
                Intent intent=new Intent(getApplicationContext(), MbtiActivity.class);
                startActivity(intent);
            }
        });
    }
}
