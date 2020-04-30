/**
 * Copyright (c) 2016 Pooja, SriHarsha
 * This code is available under the "MIT License".
 * Please see the file LICENSE in this distribution
 * for license terms.
 */
package com.example.carP;

import android.content.Intent;
import android.location.Location;
import android.os.Bundle;
import android.os.Handler;
import android.os.Looper;
import android.os.ResultReceiver;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.RadioButton;
import android.widget.RadioGroup;
import android.widget.TextView;
import android.widget.Toast;
import com.example.carP.common.*;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;

import com.example.car.R;
import com.example.carP.models.RideInfo;
import com.google.android.gms.common.GooglePlayServicesNotAvailableException;
import com.google.android.gms.common.GooglePlayServicesRepairableException;
import com.google.android.gms.location.LocationCallback;
import com.google.android.gms.location.LocationRequest;
import com.google.android.gms.location.LocationResult;
import com.google.android.gms.location.LocationServices;
import com.google.android.gms.location.places.Place;
import com.google.android.gms.location.places.ui.PlacePicker;
import com.google.firebase.database.DataSnapshot;
import com.google.firebase.database.DatabaseError;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.database.ValueEventListener;

import java.util.ArrayList;

public class SearchActivity extends AppCompatActivity {
    private ResultReceiver resultReceiver;
    private TextView get_place;
    String address;
    int PLACE_PICKER_REQUEST =1;
    String dest;
    DatabaseReference mDatabase = FirebaseDatabase.getInstance().getReference("Offers");
    ArrayList<RideInfo> rideInfos = new ArrayList<RideInfo>();

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_search);
        resultReceiver = new AddressResultReceiver(new Handler());
        final Button pickLocation = findViewById(R.id.btn_pick);
        final EditText Destination = findViewById(R.id.edit_Dest);
        final Button SearchRide = findViewById(R.id.btn_Search);
        final Button BookRide = findViewById(R.id.bookBtn);
        get_place = findViewById(R.id.textView9);
       // BookRide.setVisibility(BookRide.GONE);
        final Button cancel = findViewById(R.id.btn_SCancel);

        cancel.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent myIntent = new Intent(v.getContext(), MainActivity.class);
                startActivityForResult(myIntent, 0);
                finish();
            }
        });

        pickLocation.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
//                PlacePicker.IntentBuilder builder = new PlacePicker.IntentBuilder();
//                try {
//                    startActivityForResult(builder.build(SearchActivity.this),PLACE_PICKER_REQUEST);
//                } catch (GooglePlayServicesRepairableException | GooglePlayServicesNotAvailableException e) {
//                    Log.e("Map Error","Error");
//                    e.printStackTrace();
//                }
                LocationRequest locationRequest = new LocationRequest();
                locationRequest.setPriority(LocationRequest.PRIORITY_HIGH_ACCURACY);
                LocationServices.getFusedLocationProviderClient(SearchActivity.this)
                        .requestLocationUpdates(locationRequest,new LocationCallback(){
                            @Override
                            public void onLocationResult(LocationResult locationResult) {
                                super.onLocationResult(locationResult);
                                LocationServices.getFusedLocationProviderClient(SearchActivity.this).removeLocationUpdates(this);
                                if(locationResult!=null && locationResult.getLocations().size()>0){
                                    int latestLocationIndex = locationResult.getLocations().size()-1;
                                    double latitude = locationResult.getLocations().get(latestLocationIndex).getLatitude();
                                    double longitude = locationResult.getLocations().get(latestLocationIndex).getLongitude();
                                    Location location = new Location("providerNA");
                                    location.setLatitude(latitude);
                                    location.setLongitude(longitude);
                                    fetchAddressFromLatLong(location);
                                }
                            }
                        }, Looper.getMainLooper());
            }
        });

        assert SearchRide != null;
        SearchRide.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(final View v) {
                dest = Destination.getText().toString();
                mDatabase.addValueEventListener(new ValueEventListener() {
                    @Override
                    public void onDataChange(@NonNull DataSnapshot dataSnapshot) {
                        for(DataSnapshot obj:dataSnapshot.getChildren()){
                            RideInfo rideInfo = obj.getValue(RideInfo.class);
                            assert rideInfo != null;
                            if(dest.equals(rideInfo.getRide_Destination())){
                                rideInfos.add(rideInfo);
                            }
                            addRadioButton(rideInfos);
                            BookRide.setVisibility(View.VISIBLE);
                        }
                    }
                    @Override
                    public void onCancelled(@NonNull DatabaseError databaseError) {
                        Log.e("Swagato","Database Error: "+databaseError.getMessage());
                    }
                });

            }
        });

        BookRide.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                RadioGroup radioGroup= findViewById(R.id.RadioButtonGroup);
                //This method is used to select ride that are available to specific destination in the form of radio buttons
                if(radioGroup.getChildCount()>0) {
                    RadioButton radioButton = findViewById(radioGroup.getCheckedRadioButtonId());
                    String selectedText = radioButton.getText().toString();
                    Toast.makeText(SearchActivity.this, selectedText, Toast.LENGTH_SHORT).show();
                    Intent myIntent = new Intent(SearchActivity.this, RideConfirmation.class);
                    myIntent.putExtra("RideDetails",selectedText);
                    myIntent.putExtra("PickupLocation",address);
                    startActivityForResult(myIntent, 0);
                    finish();
                }
                else {
                    Toast.makeText(SearchActivity.this, "No Rides available to book.. Please try again", Toast.LENGTH_SHORT).show();
                }
            }
        });

    }

    /**
     * This method is used to set address of pickup location
     * @param address address of pick up location
     */
    public void setAddress(String address){
        this.address = address;
    }

    /**
     * This method is  used to get lpickup location from maps and set it to address
     * @param requestCode request code
     * @param resultCode result code
     * @param data data fetched
     */
    protected void onActivityResult(int requestCode, int resultCode, Intent data) {
        super.onActivityResult(requestCode, resultCode, data);
        if (requestCode == PLACE_PICKER_REQUEST) {
            if (resultCode == RESULT_OK) {
                Place place = PlacePicker.getPlace(data, this);
                address = String.format("Pickup Location: %s", place.getAddress());
                get_place.setText(address);
                setAddress(address);
            }
        }
    }

    /**
     * This method is used to display all the rides available to specific destination
     * @param rideInfos all the rides that are available
     */
    private void addRadioButton(ArrayList<RideInfo> rideInfos) {

        RadioGroup radioGroup= findViewById(R.id.RadioButtonGroup);
        RadioGroup.LayoutParams rprms;
        radioGroup.removeAllViews();

        if(rideInfos.size()>0) {
            for(int i=0;i<(rideInfos.size());i++){
                RadioButton radioButton = new RadioButton(this);
                String text = "CAR NO- " + rideInfos.get(i).getCar_Num() + " -Source- " + rideInfos.get(i).getRide_Source() +
                        " -Destination- " + rideInfos.get(i).getRide_Destination() + " -Time- " + rideInfos.get(i).getTime();
                radioButton.setText(text);
                radioButton.setId(i);
                rprms= new RadioGroup.LayoutParams(RadioGroup.LayoutParams.WRAP_CONTENT, RadioGroup.LayoutParams.WRAP_CONTENT);
                radioGroup.addView(radioButton, rprms);
            }
        }
        else {
            Toast.makeText(SearchActivity.this, "No Rides available to destination.. Please try again", Toast.LENGTH_SHORT).show();
        }
    }
    private void fetchAddressFromLatLong(Location location){
        Intent intent = new Intent(this,FetchAddress.class);
        intent.putExtra(constants.RECEIVER,resultReceiver);
        intent.putExtra(constants.LOCATION_DATA_EXTRA,location);
        startActivity(intent);
    }
    private class AddressResultReceiver extends ResultReceiver{
        AddressResultReceiver(Handler handle){
            super(handle);
        }

        @Override
        protected void onReceiveResult(int resultCode, Bundle resultData) {
            super.onReceiveResult(resultCode, resultData);
            if(resultCode == constants.SUCCESS_RESULT){
                get_place.setText(resultData.getString(constants.RESULT_DATA_KEY));
            }else{
                Toast.makeText(SearchActivity.this, resultData.getString(constants.RESULT_DATA_KEY), Toast.LENGTH_SHORT).show();
            }
        }
    }
 }
