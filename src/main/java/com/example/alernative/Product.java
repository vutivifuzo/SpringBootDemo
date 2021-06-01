//package com.example.alernative;
//
//import javax.persistence.*;
//import java.util.List;
//
//@Entity
//@Table(name = "product")
//public class Product {
//    @Id
//    @GeneratedValue(strategy = GenerationType.IDENTITY)
//    private long id;
//
//
//    @Column(nullable = false, length = 20)
//    private String ProductName;
//
//    @Column(nullable = false, length = 20)
//    private String ProductType;
//
//    @Column(nullable = false, length = 20)
//    private int Quantity;
//
//    public long getId() {
//        return id;
//    }
//
//    public void setId(long id) {
//        this.id = id;
//    }
//
//    public String getProductName() {
//        return ProductName;
//    }
//
//    public void setProductName(String productName) {
//        ProductName = productName;
//    }
//
//    public String getProductType() {
//        return ProductType;
//    }
//
//    public void setProductType(String productType) {
//        ProductType = productType;
//    }
//
//    public int getQuantity() {
//        return Quantity;
//    }
//
//    public void setQuantity(int quantity) {
//        Quantity = quantity;
//    }
//
//    @OneToOne(targetEntity = User.class,cascade = CascadeType.ALL)
//    private User user;
//
//    @ManyToMany(targetEntity = Stakeholder.class,cascade = CascadeType.ALL)
//    private List<Stakeholder> stakeholder;
//
//}
