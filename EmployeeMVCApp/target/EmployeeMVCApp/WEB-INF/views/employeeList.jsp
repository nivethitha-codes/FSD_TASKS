<%@ page contentType="text/html;charset=UTF-8" language="java" %>
<%@ taglib uri="http://java.sun.com/jsp/jstl/core" prefix="c" %>

<html>
<head>
<title>Employee List</title>
</head>

<body>

<h2>Employee List</h2>

<table border="1">

<tr>
<th>ID</th>
<th>Name</th>
<th>Department</th>
</tr>

<c:forEach var="emp" items="${employees}">
<tr>
<td>${emp.id}</td>
<td>${emp.name}</td>
<td>${emp.department}</td>
</tr>
</c:forEach>

</table>

</body>
</html>