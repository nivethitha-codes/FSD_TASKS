package com.veltech.productapi.entity;

import jakarta.persistence.*;
import jakarta.validation.constraints.*;

@Entity
@Table(name="product")
public class Product {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private int productId;

    @NotBlank(message = "Product name cannot be empty")
    private String productName;

    @Min(value = 1, message = "Cost must be greater than 0")
    private double productCost;

    @NotBlank(message = "Company name cannot be empty")
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