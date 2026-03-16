package com.employee.service;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Component;

import com.employee.model.Employee;
import com.employee.repository.EmployeeRepository;

@Component
public class EmployeeService {

    @Autowired
    private EmployeeRepository repository;

    public void addEmployee(Employee emp) {
        repository.addEmployee(emp);
    }

    public void displayEmployees() {
        repository.getEmployees().forEach(System.out::println);
    }
}