package com.example.task18orderservice;

import org.junit.jupiter.api.BeforeEach;
import org.junit.jupiter.api.DisplayName;
import org.junit.jupiter.api.Test;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.test.autoconfigure.web.servlet.WebMvcTest;
import org.springframework.boot.test.mock.mockito.MockBean;
import org.springframework.test.web.servlet.MockMvc;
import org.springframework.web.client.ResourceAccessException;
import org.springframework.web.client.RestTemplate;

import java.util.HashMap;
import java.util.Map;

import static org.mockito.Mockito.when;
import static org.springframework.test.web.servlet.request.MockMvcRequestBuilders.get;
import static org.springframework.test.web.servlet.result.MockMvcResultMatchers.jsonPath;
import static org.springframework.test.web.servlet.result.MockMvcResultMatchers.status;

@WebMvcTest(OrderController.class)
public class Task18OrderServiceApplicationTests {

    @Autowired
    private MockMvc mockMvc;

    @MockBean
    private RestTemplate restTemplate;

    private Map<String, Object> fakeProduct;

    @BeforeEach
    public void setup() {
        fakeProduct = new HashMap<>();
        fakeProduct.put("id", 1);
        fakeProduct.put("name", "Product_1");
        fakeProduct.put("price", 100.0);
        fakeProduct.put("available", true);
    }

    @Test
    @DisplayName("Test 1: Get order successfully with product details")
    public void testGetOrderSuccess() throws Exception {
        when(restTemplate.getForObject(
                "http://localhost:8081/products/1", Map.class))
                .thenReturn(fakeProduct);

        mockMvc.perform(get("/orders/1"))
                .andExpect(status().isOk())
                .andExpect(jsonPath("$.orderId").value(1))
                .andExpect(jsonPath("$.customerName").value("Customer_1"))
                .andExpect(jsonPath("$.status").value("SUCCESS"))
                .andExpect(jsonPath("$.productDetails.name").value("Product_1"));
    }

    @Test
    @DisplayName("Test 2: Get all orders returns correct total")
    public void testGetAllOrders() throws Exception {
        mockMvc.perform(get("/orders"))
                .andExpect(status().isOk())
                .andExpect(jsonPath("$.total").value(3))
                .andExpect(jsonPath("$.status").value("SUCCESS"));
    }

    @Test
    @DisplayName("Test 3: Fallback when product service is down")
    public void testFallbackWhenProductServiceDown() throws Exception {
        when(restTemplate.getForObject(
                "http://localhost:8081/products/1", Map.class))
                .thenThrow(new ResourceAccessException("Connection refused"));

        mockMvc.perform(get("/orders/1"))
                .andExpect(status().isOk())
                .andExpect(jsonPath("$.status").value("PRODUCT_SERVICE_UNAVAILABLE"))
                .andExpect(jsonPath("$.message").value("Product service is down. Showing fallback data."))
                .andExpect(jsonPath("$.productDetails.name").value("Unknown Product"))
                .andExpect(jsonPath("$.productDetails.available").value(false));
    }

    @Test
    @DisplayName("Test 4: Order always has customer name and quantity")
    public void testOrderDataIntegrity() throws Exception {
        when(restTemplate.getForObject(
                "http://localhost:8081/products/2", Map.class))
                .thenReturn(fakeProduct);

        mockMvc.perform(get("/orders/2"))
                .andExpect(status().isOk())
                .andExpect(jsonPath("$.customerName").value("Customer_2"))
                .andExpect(jsonPath("$.quantity").value(2));
    }

    @Test
    @DisplayName("Test 5: Fallback product has correct default values")
    public void testFallbackProductValues() {
        OrderController controller = new OrderController();
        Map<String, Object> fallback = controller.getFallbackProduct(99);

        assert fallback.get("name").equals("Unknown Product");
        assert fallback.get("available").equals(false);
        assert fallback.get("price").equals(0.0);
        assert fallback.get("id").equals(99);
    }
}