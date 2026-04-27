package com.example.task18productservice;

import org.junit.jupiter.api.Test;
import org.junit.jupiter.api.DisplayName;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.test.autoconfigure.web.servlet.WebMvcTest;
import org.springframework.test.web.servlet.MockMvc;

import static org.springframework.test.web.servlet.request.MockMvcRequestBuilders.get;
import static org.springframework.test.web.servlet.result.MockMvcResultMatchers.jsonPath;
import static org.springframework.test.web.servlet.result.MockMvcResultMatchers.status;

@WebMvcTest(ProductController.class)
public class Task18ProductServiceApplicationTests {

    @Autowired
    private MockMvc mockMvc;

    @Test
    @DisplayName("Test 1: Get product by ID returns correct data")
    public void testGetProductById() throws Exception {
        mockMvc.perform(get("/products/1"))
                .andExpect(status().isOk())
                .andExpect(jsonPath("$.id").value(1))
                .andExpect(jsonPath("$.name").value("Product_1"))
                .andExpect(jsonPath("$.price").value(100.0))
                .andExpect(jsonPath("$.available").value(true));
    }

    @Test
    @DisplayName("Test 2: Get all products returns list")
    public void testGetAllProducts() throws Exception {
        mockMvc.perform(get("/products"))
                .andExpect(status().isOk())
                .andExpect(jsonPath("$.total").value(3))
                .andExpect(jsonPath("$.products").isArray());
    }

    @Test
    @DisplayName("Test 3: Product price calculated correctly")
    public void testProductPriceCalculation() throws Exception {
        mockMvc.perform(get("/products/5"))
                .andExpect(status().isOk())
                .andExpect(jsonPath("$.price").value(500.0))
                .andExpect(jsonPath("$.name").value("Product_5"));
    }

    @Test
    @DisplayName("Test 4: Product is available by default")
    public void testProductAvailability() throws Exception {
        mockMvc.perform(get("/products/2"))
                .andExpect(status().isOk())
                .andExpect(jsonPath("$.available").value(true));
    }
}