package com.example.carP.models;

public class RideInfo { // For Serialization

//    private String id;
    private String User_id;
    private String Ride_Source;
    private String Ride_Destination;
    private String Time;
    private String Status;
    private String Car_Num;
    private String Phone_Num;
    private String sub;
    private String body;

    public RideInfo(String user_id, String ride_Source, String ride_Destination, String time, String status, String car_Num,
                    String phone_Num, String body) {
//        this.id = id;
        this.User_id = user_id;
        this.Ride_Source = ride_Source;
        this.Ride_Destination = ride_Destination;
        this.Time = time;
        this.Status = status;
        this.Car_Num = car_Num;
        this.Phone_Num = phone_Num;
//        this.sub = sub;
        this.body = body;
    }
    public RideInfo(){

    }

    public String getUser_id() {
        return User_id;
    }

    public void setUser_id(String user_id) {
        User_id = user_id;
    }

    public String getRide_Source() {
        return Ride_Source;
    }

    public void setRide_Source(String ride_Source) {
        Ride_Source = ride_Source;
    }

    public String getRide_Destination() {
        return Ride_Destination;
    }

    public void setRide_Destination(String ride_Destination) {
        Ride_Destination = ride_Destination;
    }

    public String getTime() {
        return Time;
    }

    public void setTime(String time) {
        Time = time;
    }

    public String getStatus() {
        return Status;
    }

    public void setStatus(String status) {
        Status = status;
    }

    public String getCar_Num() {
        return Car_Num;
    }

    public void setCar_Num(String car_Num) {
        Car_Num = car_Num;
    }

    public String getPhone_Num() {
        return Phone_Num;
    }

    public void setPhone_Num(String phone_Num) {
        Phone_Num = phone_Num;
    }

    public String getSub() {
        return sub;
    }

    public void setSub(String sub) {
        this.sub = sub;
    }

    public String getBody() {
        return body;
    }

    public void setBody(String body) {
        this.body = body;
    }
}