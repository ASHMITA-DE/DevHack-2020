package com.example.carP;

import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;

import com.example.car.R;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;

/**
 * This class used to update information of user as like password , car no and mobile no
 */
public class UpdateActivity extends AppCompatActivity {
    DatabaseReference mDatabase = FirebaseDatabase.getInstance().getReference();

    String user;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_update);

        final Button update = findViewById(R.id.btn_UpdateProfile);
        final Button cancel = findViewById(R.id.btn_UpdateCancel);
        TextView textView = findViewById(R.id.textview_UserID);
        textView.setText(user);
        final EditText first = findViewById(R.id.editText_first_name);
        final EditText last = findViewById(R.id.editText_last_name);
        final EditText Phone = findViewById(R.id.editText_PhoneNo);
        final EditText CarNo = findViewById(R.id.editText_CarNo);

        cancel.setOnClickListener(new View.OnClickListener() {
          @Override
          public void onClick(View v) {
              Intent myIntent = new Intent(v.getContext(), MainActivity.class);
              startActivityForResult(myIntent, 0);
              finish();
          }
        });

        update.setOnClickListener(new View.OnClickListener(){
            @Override
             public void onClick(View v) {
                 Intent myIntent = new Intent(v.getContext(), MainActivity.class);
                 startActivityForResult(myIntent, 0);
                 finish();
             }
        });

    }
}
