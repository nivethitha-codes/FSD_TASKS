package com.example.task17productservice;

import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.web.bind.annotation.*;
import java.util.HashMap;
import java.util.Map;

@SpringBootApplication
@RestController
@RequestMapping("/products")
public class Task17ProductServiceApplication {

    public static void main(String[] args) {
        SpringApplication.run(Task17ProductServiceApplication.class, args);
    }

    @GetMapping("/{id}")
    public Map<String, Object> getProduct(@PathVariable int id) {
        Map<String, Object> product = new HashMap<>();
        product.put("id", id);
        product.put("name", "Product_" + id);
        product.put("price", id * 100.0);
        product.put("available", true);
        return product;
    }

    @GetMapping
    public Map<String, Object> getAllProducts() {
        Map<String, Object> response = new HashMap<>();
        response.put("products", new String[]{"Product_1", "Product_2", "Product_3"});
        response.put("total", 3);
        return response;
    }
}