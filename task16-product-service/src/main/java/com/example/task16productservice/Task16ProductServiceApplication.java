package com.example.task16productservice;

import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.web.bind.annotation.*;
import org.springframework.core.env.Environment;
import org.springframework.beans.factory.annotation.Autowired;

@SpringBootApplication
@RestController
@RequestMapping("/products")
public class Task16ProductServiceApplication {

    @Autowired
    private Environment env;

    public static void main(String[] args) {
        SpringApplication.run(Task16ProductServiceApplication.class, args);
    }

    @GetMapping
    public String getAllProducts() {
        String port = env.getProperty("local.server.port");
        return "Products list from instance on port: " + port;
    }

    @GetMapping("/{id}")
    public String getProduct(@PathVariable String id) {
        String port = env.getProperty("local.server.port");
        return "Product [" + id + "] from instance on port: " + port;
    }
}