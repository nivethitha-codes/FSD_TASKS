package com.employee.mvc.controller;

import java.util.ArrayList;
import java.util.List;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;

import com.employee.mvc.model.Employee;

@Controller
public class EmployeeController {

    @GetMapping("/employees")
    public String getEmployees(Model model) {

        List<Employee> employees = new ArrayList<>();

        employees.add(new Employee(1,"John","IT"));
        employees.add(new Employee(2,"Sara","HR"));
        employees.add(new Employee(3,"David","Finance"));
        employees.add(new Employee(4,"Emma","Marketing"));
        employees.add(new Employee(5,"Michael","IT"));
        employees.add(new Employee(6,"Sophia","HR"));
        employees.add(new Employee(7,"Daniel","Finance"));
        employees.add(new Employee(8,"Olivia","Marketing"));
        employees.add(new Employee(9,"James","IT"));
        employees.add(new Employee(10,"Isabella","HR"));

        model.addAttribute("employees", employees);

        return "employeeList";
    }
}