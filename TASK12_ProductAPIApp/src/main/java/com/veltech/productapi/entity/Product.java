package com.veltech.productapi.entity;

import jakarta.persistence.*;

@Entity
@Table(name="product")
public class Product {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private int productId;

    @Column(name="product_name")
    private String productName;

    @Column(name="product_cost")
    private double productCost;

    @Column(name="product_company")
    private String productCompany;

    public Product() {}

    public int getProductId() { return productId; }
    public void setProductId(int productId) { this.productId = productId; }

    public String getProductName() { return productName; }
    public void setProductName(String productName) { this.productName = productName; }

    public double getProductCost() { return productCost; }
    public void setProductCost(double productCost) { this.productCost = productCost; }

    public String getProductCompany() { return productCompany; }
    public void setProductCompany(String productCompany) { this.productCompany = productCompany; }
}