package com.example.carP;
import android.content.Intent;
import android.os.Bundle;
import android.text.TextUtils;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.Toast;

import androidx.annotation.NonNull;

import com.example.car.R;
import com.example.carP.common.userDetails;
import com.example.carP.models.User;
import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.Task;
import com.google.firebase.auth.AuthResult;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.auth.FirebaseUser;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.storage.FirebaseStorage;
import com.google.firebase.storage.StorageReference;


/**
 * Created by Marta on 10/8/17.
 */

public class SignUpActivity extends BaseActivity implements View.OnClickListener {

    private static final String TAG = "SignUpActivity";

    private DatabaseReference mDatabase;
    private FirebaseAuth mAuth;

    private EditText FirstEditText, LastEditText;
    private EditText EmailEditText, PasswordEditText;
    private EditText phoneEditText, carNumberEditText;
    private Button mSignUpButton;

    private ImageView profileImage;
    private final int PICK_IMAGE_REQUEST = 1;

    private FirebaseStorage storage;
    private StorageReference storageReference;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_sign_up);

        mDatabase = FirebaseDatabase.getInstance().getReference("Users");
        mAuth = FirebaseAuth.getInstance();

        storage = FirebaseStorage.getInstance();
        storageReference = storage.getReference();

        profileImage = (ImageView) findViewById(R.id.profile_image);
        FirstEditText = (EditText) findViewById(R.id.first_name);
        LastEditText = (EditText) findViewById(R.id.last_name);
        EmailEditText = (EditText) findViewById(R.id.create_email);
        PasswordEditText = (EditText) findViewById(R.id.create_password);
        phoneEditText = (EditText) findViewById(R.id.create_phone);
        carNumberEditText = (EditText) findViewById(R.id.create_car);
        mSignUpButton = findViewById(R.id.save_information);

        mSignUpButton.setOnClickListener(this);
    }

    public void onStart() {
        super.onStart();

        //Check auth on Activity start
        if (mAuth.getCurrentUser() != null) {
            onAuthSuccess(mAuth.getCurrentUser());
        }
    }

    private void SignUp() {
        Log.d(TAG, "signUp");
        if (!validateForm()) {
            return;
        }

        showProgressDialog();
        String email = EmailEditText.getText().toString();
        String password = PasswordEditText.getText().toString();

        mAuth.createUserWithEmailAndPassword(email, password).addOnCompleteListener(this, new OnCompleteListener<AuthResult>() {
            @Override
            public void onComplete(@NonNull Task<AuthResult> task) {
                if (task.isSuccessful()) {
                    onAuthSuccess(task.getResult().getUser());
                } else {
                    Toast.makeText(SignUpActivity.this, "Sign Up Failed", Toast.LENGTH_SHORT).show();
                }
            }
        });


    }

    private boolean validateForm() {
        boolean result = true;
        if (TextUtils.isEmpty(EmailEditText.getText().toString())) {
            EmailEditText.setError("Required");
            result = false;
        } else {
            EmailEditText.setError(null);
        }

        if (TextUtils.isEmpty(PasswordEditText.getText().toString())) {
            PasswordEditText.setError("Required");
            result = false;
        } else {
            PasswordEditText.setError(null);
        }
        return result;
    }

    private void onAuthSuccess(FirebaseUser user) {
        String first = FirstEditText.getText().toString();
        String last = LastEditText.getText().toString();
        String carNumber = carNumberEditText.getText().toString();
        String phone = "";
        if (phoneEditText != null) {
            phone = phoneEditText.getText().toString();
        }

        userDetails.uid = user.getUid();
        userDetails.email = user.getEmail();
        userDetails.firstName = first;
        userDetails.lastName = last;
        userDetails.phoneNumber = phone;
        userDetails.carNumber = carNumber;
        Log.e("NEW USER CREATED",userDetails.email+" "+userDetails.email+" "+user.getUid());
        writeNewUser(user.getUid(),user.getEmail(), first, last, phone,carNumber);

        //Go to MainActivity
        Toast.makeText(SignUpActivity.this,"Logged in: "+user.getUid()+" "+userDetails.email,Toast.LENGTH_SHORT).show();
        Intent intent = new Intent(SignUpActivity.this, MainActivity.class);
        intent.putExtra("callingActivity", "SignUpActivity");
        startActivity(intent);
        finish();
    }

    //Writes user's email in users table
    private void writeNewUser(String userId, String email, String first, String last, String phone, String carNumber) {
        User user = new User(email, first, last, phone, carNumber);

        mDatabase.child(userId).setValue(user);
    }

    public void onClick(View view) {
        switch (view.getId()) {
            case R.id.save_information:
                SignUp();
                break;

        }
    }
}

