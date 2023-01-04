package com.example.myapplication;

import static com.example.myapplication.LoginActivity.user_id;

import static java.lang.Boolean.FALSE;
import static java.lang.Boolean.TRUE;

import android.app.Activity;
import android.app.DatePickerDialog;
import android.app.TimePickerDialog;
import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.DatePicker;
import android.widget.EditText;
import android.widget.RadioButton;
import android.widget.TextView;
import android.widget.TimePicker;

import androidx.annotation.Nullable;

import java.text.SimpleDateFormat;
import java.util.Calendar;

public class Input0Activity extends Activity {
    Calendar dd = Calendar.getInstance();
    Calendar tt = Calendar.getInstance();

    @Override
    protected void onCreate(@Nullable Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.input0);
        TextView d = (TextView) findViewById(R.id.input_date);
        TextView t = (TextView) findViewById(R.id.input_time);
        Button n0 = (Button)findViewById(R.id.next0);

        int Year = dd.get(Calendar.YEAR);
        int Month = dd.get(Calendar.MONTH);
        int Day = dd.get(Calendar.DAY_OF_MONTH);
        int Hour=tt.get(Calendar.HOUR);
        int Min=tt.get(Calendar.MINUTE);

        SimpleDateFormat dateFormat = new SimpleDateFormat("yyyy-MM-dd");
        d.setOnClickListener(new View.OnClickListener(){
            public void onClick(View view){
                DatePickerDialog dpDialog = new DatePickerDialog(Input0Activity.this, new DatePickerDialog.OnDateSetListener() {
                    @Override
                    public void onDateSet(DatePicker view, int year, int month, int dayOfMonth) {
                        d.setText(year+"-"+(month+1)+"-"+dayOfMonth);
                    }
                }, Year, Month, Day);
                dpDialog.show();
            }
        });

        SimpleDateFormat timeFormat = new SimpleDateFormat("HH:mm");
        t.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                TimePickerDialog tpDialog = new TimePickerDialog(Input0Activity.this,android.R.style.Theme_Holo_Light_Dialog, new TimePickerDialog.OnTimeSetListener() {
                    @Override
                    public void onTimeSet(TimePicker view, int hourOfDay, int minute) {
                        t.setText(hourOfDay+":"+minute);
                    }
                }, Hour, Min, false);
                tpDialog.show();
            }
        });

        n0.setOnClickListener(new View.OnClickListener(){
            public void onClick(View v){
                String date = dateFormat.format(dd.getTime());
                String time=timeFormat.format(tt.getTime());

                String input_date=date +" "+time+":00";
                Log.v("day_test","   "+input_date);

                EditText editText2 = (EditText)findViewById(R.id.sleep);
                String sleep = editText2.getText().toString();

                EditText editText3 = (EditText)findViewById(R.id.feeling);
                String feel = editText3.getText().toString();

                String smoke;
                RadioButton yes = (RadioButton)findViewById(R.id.smoke_yes);
                RadioButton no = (RadioButton)findViewById(R.id.smoke_no);

                if(yes.isChecked()){
                    smoke = "1";
                }else if(no.isChecked()) {
                    smoke = "0";
                }else {
                    smoke="exception";
                }

                String drink;
                RadioButton no_drink = (RadioButton)findViewById(R.id.no_drinking);
                RadioButton moderate = (RadioButton)findViewById(R.id.drinking);
                RadioButton heavy = (RadioButton)findViewById(R.id.heavy_drinking);

                if(no_drink.isChecked()){
                    drink = "0";
                }else if(moderate.isChecked()){
                    drink = "1";
                }else if(heavy.isChecked()){
                    drink = "2";
                }else {
                    drink="exception";
                }

                try {
                    Input4Activity dt = new Input4Activity();
                    dt.sto[24] = user_id;
                    dt.sto[25] = sleep;
                    dt.sto[26] = feel;
                    dt.sto[27] = smoke;
                    dt.sto[28] = drink;
                    dt.sto[29] = input_date;
                    //dt.data_storage(0,c1, c2, c3, c4, c5, c6);
                } catch (Exception e) {
                    e.printStackTrace();
                }
                Intent intent=new Intent(getApplicationContext(), Input1Activity.class);
                startActivity(intent);
            }
        });
    }
}