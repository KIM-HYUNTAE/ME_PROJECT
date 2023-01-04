package com.example.myapplication;

import android.Manifest;
import android.app.Activity;
import android.app.PendingIntent;
import android.content.BroadcastReceiver;
import android.content.Context;
import android.content.Intent;
import android.content.IntentFilter;
import android.content.pm.PackageManager;
import android.os.Bundle;
import android.telephony.SmsManager;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import androidx.annotation.Nullable;
import androidx.core.app.ActivityCompat;
import androidx.core.content.ContextCompat;

public class FindPWActivity extends Activity {
    EditText inputphone;
    Button sendbtn;

    @Override
    protected void onCreate(@Nullable Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.findpw);

        inputphone=findViewById(R.id.input_phone_num);
        sendbtn=findViewById(R.id.send_sms_button);

        sendbtn.setOnClickListener(new View.OnClickListener() {
            public void onClick(View v) {
                sendSMS("5215554","GOOD1234");
            }
        });
    }
    private void sendSMS(String phoneNum, String message){
        String SENT="SMS_SENT";
        String DELIVERED = "SMS_DELIVERED";
        PendingIntent sentPI=PendingIntent.getBroadcast(this, 0, new Intent(SENT),0);
        PendingIntent deliveredPI=PendingIntent.getBroadcast(this, 0,new Intent(DELIVERED),0);

        registerReceiver(new BroadcastReceiver() {
            @Override
            public void onReceive(Context context, Intent intent) {
                switch(getResultCode()){
                    case Activity.RESULT_OK:
                        Toast.makeText(getBaseContext(), "알림 문자가 전송되었습니다.",Toast.LENGTH_SHORT).show();
                        break;
                }
            }
        }, new IntentFilter(SENT));
        SmsManager sms=SmsManager.getDefault();
        sms.sendTextMessage(phoneNum,null,message,sentPI,deliveredPI);
    }
}
