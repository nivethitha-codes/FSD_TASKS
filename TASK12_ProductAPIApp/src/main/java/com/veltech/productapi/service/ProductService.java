package com.veltech.productapi.service;

import java.util.List;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import com.veltech.productapi.entity.Product;
import com.veltech.productapi.repository.ProductRepository;

@Service
public class ProductService {

    @Autowired
    private ProductRepository repo;

    // Save Product
    public Product saveProduct(Product p) {
        return repo.save(p);
    }

    // Get all Products
    public List<Product> getAllProducts() {
        return repo.findAll();
    }

    // Get Product by ID
    public Product getProductById(int id) {
        return repo.findById(id).orElse(null);
    }

    // Update Product
    public Product updateProduct(Product p) {
        return repo.save(p);
    }

    // Delete Product
    public void deleteProduct(int id) {
        repo.deleteById(id);
    }
}