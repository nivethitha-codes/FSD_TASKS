package com.employee.main;

import org.springframework.beans.factory.BeanFactory;
import org.springframework.context.support.ClassPathXmlApplicationContext;

import com.employee.model.Employee;
import com.employee.service.EmployeeService;

public class MainApp {

    public static void main(String[] args) {

        BeanFactory factory =
                new ClassPathXmlApplicationContext("applicationContext.xml");

        EmployeeService service = factory.getBean(EmployeeService.class);

        service.addEmployee(new Employee(1,"John","IT"));
        service.addEmployee(new Employee(2,"Sara","HR"));
        service.addEmployee(new Employee(3,"David","Finance"));

        service.displayEmployees();
    }
}