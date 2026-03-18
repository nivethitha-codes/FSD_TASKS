package com.veltech.productapi.controller;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.*;

import com.veltech.productapi.entity.Product;
import com.veltech.productapi.service.ProductService;

@RestController
@RequestMapping("/products")
public class ProductController {

    @Autowired
    private ProductService service;

    // CREATE Product
    @PostMapping
    public Product addProduct(@RequestBody Product p) {
        return service.saveProduct(p);
    }

    // READ all Products
    @GetMapping
    public List<Product> getAllProducts() {
        return service.getAllProducts();
    }

    // READ Product by ID
    @GetMapping("/{id}")
    public Product getProduct(@PathVariable int id) {
        return service.getProductById(id);
    }

    // UPDATE Product
    @PutMapping
    public Product updateProduct(@RequestBody Product p) {
        return service.updateProduct(p);
    }

    // DELETE Product
    @DeleteMapping("/{id}")
    public String deleteProduct(@PathVariable int id) {
        service.deleteProduct(id);
        return "Product Deleted Successfully";
    }
}