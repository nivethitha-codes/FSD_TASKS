package com.veltech.productapi.repository;

import org.springframework.data.jpa.repository.JpaRepository;
import com.veltech.productapi.entity.Product;

public interface ProductRepository extends JpaRepository<Product, Integer> {
}