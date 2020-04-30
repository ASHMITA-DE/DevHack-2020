package com.example.carP;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.Toast;

import com.example.car.R;
import com.example.carP.common.userDetails;
import com.example.carP.models.User;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.database.DataSnapshot;
import com.google.firebase.database.DatabaseError;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.database.ValueEventListener;

public class MainActivity extends BaseActivity {

    private static final String TAG = "MainActivity";
    private Button mLogOut;
    private Button mSearch;
    private Button mOfrRide;
    private Button mUpdate;
    private DatabaseReference mDatabase;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_0_main);
//        this.getUser(getUid());
//        System.out.println(getUid());
        mSearch = (Button) this.findViewById(R.id.rider_mode_button);
        mOfrRide = (Button) this.findViewById(R.id.driver_mode_button);
        mUpdate = (Button) this.findViewById(R.id.btn_Update);
        mLogOut = (Button) this.findViewById(R.id.btn_Logout);
        mSearch.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View v) {
                Intent myIntent = new Intent(v.getContext(), SearchActivity.class);
                startActivityForResult(myIntent, 0);
                finish();
            }

        });

        mOfrRide.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View v) {
                Intent myIntent = new Intent(v.getContext(), OfferActivity.class);
                startActivityForResult(myIntent, 0);
                finish();
            }

        });


        mUpdate.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent myIntent = new Intent(v.getContext(), UpdateActivity.class);
                startActivityForResult(myIntent, 0);
                finish();
            }

        });
//        mLogOut.setVisibility(View.VISIBLE);
        mLogOut.setOnClickListener(new View.OnClickListener(){
            @Override
            public void onClick(View view){
                Toast.makeText(MainActivity.this,"Logged in: "+userDetails.uid+" "+ userDetails.email,Toast.LENGTH_SHORT).show();
                FirebaseAuth.getInstance().signOut();
                startActivity(new Intent(MainActivity.this, SignInActivity.class));
                finish();
            }
        });

        System.out.println("About to start service.");
        mDatabase = FirebaseDatabase.getInstance().getReference().child("Users");
    }

//    public void getUser(String uid) {
//
//        // System.out.println("Starting to set user....");
//        try {
//            mDatabase.child("users").child(uid).addListenerForSingleValueEvent(new ValueEventListener() {
//                @Override
//                public void onDataChange(DataSnapshot dataSnapshot) {
//                    // Need to get the user object before loading posts because the query to find posts requires user.
//
//                    // Get User object and use the values to update the UI
//                    user = dataSnapshot.getValue(User.class);
//                }
//
//                @Override
//                public void onCancelled(DatabaseError databaseError) {
//
//                }
//            });
//
//        }
//        catch (NullPointerException e){
//            System.out.println("Null user");
//            this.user = null;
//        }
//        //getUid()
//    }

    //This method will push this Firebasetoken online so that
    //  the cloud functions may use it.
//    public void pushTokenToFirebase(){
//        Map<String, Object> childUpdates = new HashMap<>();
//        String instance_id = FirebaseInstanceId.getInstance().getId();
//        String instance_token = FirebaseInstanceId.getInstance().getToken();
//
//        System.out.println(getUid());
//        System.out.println(FirebaseInstanceId.getInstance().getId());
//        System.out.println(instance_token);
//
//        childUpdates.put("/users/"+getUid()+"/firebase_instance_id/", instance_id);
//        childUpdates.put("/users/"+getUid()+"/firebase_instance_token/", instance_token);
//        mDatabase.updateChildren(childUpdates);
//    }

}

