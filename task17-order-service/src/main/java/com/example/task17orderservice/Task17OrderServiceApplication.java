package com.example.task17orderservice;

import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.web.bind.annotation.*;
import org.springframework.web.client.RestTemplate;
import org.springframework.web.client.ResourceAccessException;
import org.springframework.web.client.HttpClientErrorException;
import org.springframework.http.ResponseEntity;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.context.annotation.Bean;
import org.springframework.context.annotation.Configuration;
import java.util.HashMap;
import java.util.Map;

@SpringBootApplication
public class Task17OrderServiceApplication {

    public static void main(String[] args) {
        SpringApplication.run(Task17OrderServiceApplication.class, args);
    }
}

@Configuration
class AppConfig {
    @Bean
    public RestTemplate restTemplate() {
        return new RestTemplate();
    }
}

@RestController
@RequestMapping("/orders")
class OrderController {

    @Autowired
    private RestTemplate restTemplate;

    private final String PRODUCT_SERVICE_URL = "http://localhost:8081/products";

    @GetMapping("/{id}")
    public ResponseEntity<Map<String, Object>> getOrder(@PathVariable int id) {
        Map<String, Object> response = new HashMap<>();
        response.put("orderId", id);
        response.put("customerName", "Customer_" + id);
        response.put("quantity", 2);

        try {
            Map productDetails = restTemplate.getForObject(
                PRODUCT_SERVICE_URL + "/" + id, Map.class
            );
            response.put("productDetails", productDetails);
            response.put("status", "SUCCESS");

        } catch (ResourceAccessException e) {
            response.put("productDetails", getFallbackProduct(id));
            response.put("status", "PRODUCT_SERVICE_UNAVAILABLE");
            response.put("message", "Product service is down. Showing fallback data.");

        } catch (HttpClientErrorException e) {
            response.put("productDetails", null);
            response.put("status", "PRODUCT_NOT_FOUND");
            response.put("message", "Product " + id + " not found: " + e.getMessage());

        } catch (Exception e) {
            response.put("productDetails", getFallbackProduct(id));
            response.put("status", "ERROR");
            response.put("message", "Unexpected error: " + e.getMessage());
        }

        return ResponseEntity.ok(response);
    }

    @GetMapping
    public ResponseEntity<Map<String, Object>> getAllOrders() {
        Map<String, Object> response = new HashMap<>();
        response.put("orders", new int[]{1, 2, 3});
        response.put("total", 3);

        try {
            Map allProducts = restTemplate.getForObject(
                PRODUCT_SERVICE_URL, Map.class
            );
            response.put("availableProducts", allProducts);
            response.put("status", "SUCCESS");

        } catch (Exception e) {
            response.put("availableProducts", "Product service unavailable");
            response.put("status", "PARTIAL_DATA");
        }

        return ResponseEntity.ok(response);
    }

    private Map<String, Object> getFallbackProduct(int id) {
        Map<String, Object> fallback = new HashMap<>();
        fallback.put("id", id);
        fallback.put("name", "Unknown Product");
        fallback.put("price", 0.0);
        fallback.put("available", false);
        fallback.put("note", "Fallback data — product service unavailable");
        return fallback;
    }
}