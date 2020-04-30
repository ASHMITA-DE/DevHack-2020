/**
 * Copyright (c) 2016 Pooja, SriHarsha
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
import android.widget.EditText;
import android.widget.Toast;
import com.example.carP.common.*;
import androidx.appcompat.app.AppCompatActivity;

import com.example.car.R;
import com.example.carP.models.RideInfo;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;

import io.opencensus.metrics.LongGauge;

/**
 * This class is used to offer rides from particular source to destination at specific time
 */

public class OfferActivity extends AppCompatActivity {
    String to;
    String from;
    String timeDate;
    String phone;
    String carNumber;
    StringBuilder body = new StringBuilder();
    DatabaseReference mDatabase = FirebaseDatabase.getInstance().getReference().child("Offers");

    /**
     * This method is used to set layout for offer ride screen
     * It saves the offered ride in database
     * It sends mail to user regarding ride offer
     */
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_offer);

        final EditText sourceText = findViewById(R.id.editOfr_Source);
        final EditText destinationText = findViewById(R.id.editOfr_Dest);
        final EditText timeText = findViewById(R.id.editOfr_Time);
        final EditText phText = findViewById(R.id.edit_Phone);
        final EditText CarNo = findViewById(R.id.editText_CarNo);
        final Button offerRide = findViewById(R.id.btn_ofr);
        final Button cancel = findViewById(R.id.btn_Cancel);

        cancel.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent myIntent = new Intent(v.getContext(),MainActivity.class);
                startActivityForResult(myIntent, 0);
                finish();
            }
        });

        offerRide.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(final View v) {
                to = destinationText.getText().toString();
                from = sourceText.getText().toString();
                timeDate = timeText.getText().toString();
                phone = phText.getText().toString();
                carNumber = CarNo.getText().toString();
                body.append("From ");
                body.append(from);
                body.append(" To ");
                body.append(to);
                body.append(" AT TIME ");
                body.append(timeDate);
                String id = mDatabase.push().getKey();
                if(userDetails.uid.isEmpty() || from.isEmpty() || to.isEmpty() || timeDate.isEmpty() || carNumber.isEmpty() || phone.isEmpty() || body.toString().isEmpty()){
                    Log.e("SWagato",userDetails.uid.isEmpty() +" "+ from.isEmpty()+" "+ to.isEmpty()+" "+ timeDate.isEmpty()+" "+ carNumber.isEmpty()+" "+ phone.isEmpty()+" "+ body.toString().isEmpty());
                    if(userDetails.uid.isEmpty())
                        Toast.makeText(OfferActivity.this,"ERRORUID",Toast.LENGTH_SHORT).show();
                    else if(from.isEmpty())
                        Toast.makeText(OfferActivity.this,"ERRORFROM",Toast.LENGTH_SHORT).show();
                    else if(to.isEmpty())
                        Toast.makeText(OfferActivity.this,"ERRORTO",Toast.LENGTH_SHORT).show();
                    else if(timeDate.isEmpty())
                        Toast.makeText(OfferActivity.this,"ERRORTIME",Toast.LENGTH_SHORT).show();
                    else if(carNumber.isEmpty())
                        Toast.makeText(OfferActivity.this,"ERRORCARN",Toast.LENGTH_SHORT).show();
                    else if(phone.isEmpty() )
                        Toast.makeText(OfferActivity.this,"ERRORPHONE",Toast.LENGTH_SHORT).show();
                    else if(body.toString().isEmpty())
                        Toast.makeText(OfferActivity.this,"ERRORBODY",Toast.LENGTH_SHORT).show();
                }
                else{
                    RideInfo rideInfo = new RideInfo(userDetails.email,from,to,timeDate,"Available",carNumber,phone,body.toString());
                    mDatabase.child(id).setValue(rideInfo);
                    Intent myIntent = new Intent(v.getContext(),MainActivity.class);
                    startActivityForResult(myIntent, 0);
                    finish();
                }
            }
        });
    }
}
