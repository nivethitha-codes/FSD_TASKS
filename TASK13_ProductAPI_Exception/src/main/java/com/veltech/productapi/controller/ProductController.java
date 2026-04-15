package com.veltech.productapi.controller;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.*;
import jakarta.validation.Valid;

import com.veltech.productapi.entity.Product;
import com.veltech.productapi.service.ProductService;

@RestController
@RequestMapping("/products")
public class ProductController {

    @Autowired
    private ProductService service;

    // CREATE (VALIDATION ENABLED ⭐)
    @PostMapping
    public Product addProduct(@Valid @RequestBody Product p) {
        return service.saveProduct(p);
    }

    // READ ALL
    @GetMapping
    public List<Product> getAllProducts() {
        return service.getAllProducts();
    }

    // READ BY ID
    @GetMapping("/{id}")
    public Product getProduct(@PathVariable int id) {
        return service.getProductById(id);
    }

    // UPDATE (VALIDATION ENABLED ⭐)
    @PutMapping
    public Product updateProduct(@Valid @RequestBody Product p) {
        return service.updateProduct(p);
    }

    // DELETE
    @DeleteMapping("/{id}")
    public String deleteProduct(@PathVariable int id) {
        service.deleteProduct(id);
        return "Product Deleted Successfully";
    }
}