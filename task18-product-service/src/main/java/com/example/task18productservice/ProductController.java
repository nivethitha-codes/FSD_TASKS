package com.example.task18productservice;

import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;
import java.util.HashMap;
import java.util.Map;

@RestController
@RequestMapping("/products")
public class ProductController {

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