package com.veltech.productapi.service;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.veltech.productapi.entity.Product;
import com.veltech.productapi.exception.ResourceNotFoundException;
import com.veltech.productapi.repository.ProductRepository;

@Service
public class ProductService {

    @Autowired
    private ProductRepository repo;

    // CREATE
    public Product saveProduct(Product p) {
        return repo.save(p);
    }

    // READ ALL
    public List<Product> getAllProducts() {
        return repo.findAll();
    }

    // READ BY ID (WITH EXCEPTION ⭐)
    public Product getProductById(int id) {
        return repo.findById(id)
                .orElseThrow(() -> new ResourceNotFoundException("Product not found with id: " + id));
    }

    // UPDATE
    public Product updateProduct(Product p) {
        return repo.save(p);
    }

    // DELETE
    public void deleteProduct(int id) {
        repo.deleteById(id);
    }
}