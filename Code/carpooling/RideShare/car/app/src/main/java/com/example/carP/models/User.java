package com.example.carP.models;

import com.google.firebase.database.Exclude;
import com.google.firebase.database.IgnoreExtraProperties;

import java.util.HashMap;
import java.util.Map;

// [START blog_user_class]
@IgnoreExtraProperties
public class User {

    public String email;
    public String firstName;
    public String lastName;
    public String phoneNumber;
    public String carNumber;

    public User() {
        //empty constructor for firebase
    }

    // Sets email and sets all other user attributes to empty string ("").
    public User(String email, String first, String last, String phone,String carNumber) {
        this.email = email;
        // set the other fields as empty strings:
        this.firstName = first;
        this.lastName = last;
        this.phoneNumber = phone;
        if(carNumber.isEmpty())
            this.carNumber = "NO CAR";
        else
            this.carNumber = carNumber;
    }
}
// [END blog_user_class]
