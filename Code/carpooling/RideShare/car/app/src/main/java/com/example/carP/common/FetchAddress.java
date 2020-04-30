package com.example.carP.common;

import android.app.IntentService;
import android.content.Intent;
import android.location.Address;
import android.location.Geocoder;
import android.location.Location;
import android.os.Bundle;
import android.os.ResultReceiver;
import android.text.TextUtils;

import androidx.annotation.Nullable;

import java.io.IOException;
import java.util.ArrayList;
import java.util.List;
import java.util.Locale;
import java.util.Objects;

public class FetchAddress extends IntentService {
    private ResultReceiver resultReceiver;
    public FetchAddress(){
        super("FetchAddress");
    }

    @Override
    protected void onHandleIntent(@Nullable Intent intent) {
        if(intent!=null){
            String errorMessage = "";
            resultReceiver = intent.getParcelableExtra(constants.RECEIVER);
            Location location = intent.getParcelableExtra((constants.LOCATION_DATA_EXTRA));
            if(location!=null){
                return;
            }
            Geocoder geocoder = new Geocoder(this, Locale.getDefault());
            List<Address> address = null;
            try {
                address = geocoder.getFromLocation(location.getLatitude(),location.getLongitude(),1);
            } catch (Exception e) {
                errorMessage = e.getMessage();
            }
            if(address == null || address.isEmpty()){
                deliveryResultToReceiver(constants.FAILURE_RESULT,errorMessage);
            }else{
                Address address1 = address.get(0);
                ArrayList<String> addressFragments = new ArrayList<>();
                for(int i=0;i<=address1.getMaxAddressLineIndex();i++){
                 addressFragments.add(address1.getAddressLine(i));
                }
                deliveryResultToReceiver(
                        constants.SUCCESS_RESULT,
                        TextUtils.join(
                                Objects.requireNonNull(System.getProperty("line.separator")),
                                addressFragments
                        )
                );
            }
        }
    }

    private void deliveryResultToReceiver(int resultCode,String addressMessage){
        Bundle bundle = new Bundle();
        bundle.putString(constants.RESULT_DATA_KEY,addressMessage);
        resultReceiver.send(resultCode,bundle);
    }
}
