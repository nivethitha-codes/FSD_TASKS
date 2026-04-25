package com.example.task16orderservice;

import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.web.bind.annotation.*;
import org.springframework.core.env.Environment;
import org.springframework.beans.factory.annotation.Autowired;

@SpringBootApplication
@RestController
@RequestMapping("/orders")
public class Task16OrderServiceApplication {

    @Autowired
    private Environment env;

    public static void main(String[] args) {
        SpringApplication.run(Task16OrderServiceApplication.class, args);
    }

    @GetMapping
    public String getAllOrders() {
        String port = env.getProperty("local.server.port");
        return "Orders list from instance on port: " + port;
    }

    @GetMapping("/{id}")
    public String getOrder(@PathVariable String id) {
        String port = env.getProperty("local.server.port");
        return "Order [" + id + "] from instance on port: " + port;
    }
}