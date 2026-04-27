package com.example.task18orderservice;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;
import org.springframework.web.client.ResourceAccessException;
import org.springframework.web.client.RestTemplate;
import java.util.HashMap;
import java.util.Map;

@RestController
@RequestMapping("/orders")
public class OrderController {

    @Autowired
    private RestTemplate restTemplate;

    private final String PRODUCT_URL = "http://localhost:8081/products";

    @GetMapping("/{id}")
    public ResponseEntity<Map<String, Object>> getOrder(@PathVariable int id) {
        Map<String, Object> response = new HashMap<>();
        response.put("orderId", id);
        response.put("customerName", "Customer_" + id);
        response.put("quantity", 2);

        try {
            Map productDetails = restTemplate.getForObject(
                    PRODUCT_URL + "/" + id, Map.class);
            response.put("productDetails", productDetails);
            response.put("status", "SUCCESS");

        } catch (ResourceAccessException e) {
            response.put("productDetails", getFallbackProduct(id));
            response.put("status", "PRODUCT_SERVICE_UNAVAILABLE");
            response.put("message", "Product service is down. Showing fallback data.");

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
        response.put("status", "SUCCESS");
        return ResponseEntity.ok(response);
    }

    public Map<String, Object> getFallbackProduct(int id) {
        Map<String, Object> fallback = new HashMap<>();
        fallback.put("id", id);
        fallback.put("name", "Unknown Product");
        fallback.put("price", 0.0);
        fallback.put("available", false);
        fallback.put("note", "Fallback data - product service unavailable");
        return fallback;
    }
}