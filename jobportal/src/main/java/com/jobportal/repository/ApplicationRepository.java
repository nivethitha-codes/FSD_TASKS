package com.jobportal.repository;

import com.jobportal.model.Application;
import com.jobportal.model.ApplicationStatus;
import com.jobportal.model.Job;
import com.jobportal.model.User;
import org.springframework.data.jpa.repository.JpaRepository;
import java.util.List;
import java.util.Optional;

public interface ApplicationRepository extends JpaRepository<Application, Long> {
    List<Application> findByApplicant(User applicant);
    List<Application> findByJob(Job job);
    List<Application> findByJobAndStatus(Job job, ApplicationStatus status);
    Optional<Application> findByJobAndApplicant(Job job, User applicant);
    boolean existsByJobAndApplicant(Job job, User applicant);
    long countByJob(Job job);
    long countByJobAndStatus(Job job, ApplicationStatus status);
    void deleteByIdAndApplicant(Long id, User applicant);
}