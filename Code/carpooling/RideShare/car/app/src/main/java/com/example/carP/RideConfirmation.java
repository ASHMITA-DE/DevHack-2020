/**
 * Copyright (c) 2016 Pooja,SriHarsha
 * This code is available under the "MIT License".
 * Please see the file LICENSE in this distribution
 * for license terms.
 */
package com.example.carP;

import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;

import com.example.car.R;
import com.example.carP.common.userDetails;
import com.example.carP.models.RideInfo;
import com.example.carP.models.User;
import com.google.firebase.database.DataSnapshot;
import com.google.firebase.database.DatabaseError;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.database.Query;
import com.google.firebase.database.ValueEventListener;

/**
 * This class is used to display ride confirmation message and confirm ride in database and send emails accordingly
 */
public class RideConfirmation extends AppCompatActivity {

    TextView textView;
    DatabaseReference mDatabase = FirebaseDatabase.getInstance().getReference("Offers");
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_ride_confirmation);
        final Button hreturn = findViewById(R.id.homeReturn);
        final Button logout = findViewById(R.id.logoutBtn);
        Bundle extras = getIntent().getExtras();
        assert extras != null;
        final String pickupAddress = extras.getString("PickupLocation");
        final String text = extras.getString("RideDetails");
        textView = findViewById(R.id.text_RideDetails);
        TextView get_place = findViewById(R.id.textView9);
        textView.setText(" ");
        String[] RideDetails = text.split("-");
        final String carno =RideDetails[1].trim();
        String source =RideDetails[3].trim();
        String destination =RideDetails[5].trim();
        String time =RideDetails[7].trim();
        final String driverDetails = "";
        mDatabase.addValueEventListener(new ValueEventListener() {
            @Override
            public void onDataChange(@NonNull DataSnapshot dataSnapshot) {
                for(DataSnapshot obj:dataSnapshot.getChildren()){
                    RideInfo newUser = obj.getValue(RideInfo.class);
                    assert newUser != null;
                    if(carno.equals(newUser.getCar_Num()) && newUser.getStatus().equals("Available")){
                        driverDetails.concat(newUser.getUser_id()+"\nPHONE NO-" + newUser.getPhone_Num()+"\nCAR NO- " +newUser.getCar_Num());
                        //update the status
                        return;
                    }
                }
            }
            @Override
            public void onCancelled(@NonNull DatabaseError databaseError) {
                Log.e("Swagato","Database Error: "+databaseError.getMessage());
            }
        });
        String finalSetText = "\nRIDE DETAILS\n\nDriver Details -" + driverDetails + "\nSource- " + source + "\nDestination- "
                + destination + "\nTime-" + time + "\n\n\nPlease contact the driver for any ride queries.";
        textView.setText(finalSetText);


        hreturn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent myIntent = new Intent(v.getContext(), MainActivity.class);
                startActivityForResult(myIntent, 0);
                finish();
            }

        });

        logout.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent myIntent = new Intent(v.getContext(), SignInActivity.class);
                startActivityForResult(myIntent, 0);
                finish();
            }

        });

    }

    @Override
    protected void onStart() {
        super.onStart();
        Bundle extras = getIntent().getExtras();
        assert extras != null;
        final String pickupAddress = extras.getString("PickupLocation");
        Toast.makeText(this,pickupAddress,Toast.LENGTH_LONG).show();
    }
}
