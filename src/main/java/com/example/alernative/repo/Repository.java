package com.example.alernative.repo;

import com.example.alernative.User;
import org.springframework.data.repository.CrudRepository;

public interface Repository extends CrudRepository<User,Integer> {
    static void deleteById(int userid) {

    }
}
