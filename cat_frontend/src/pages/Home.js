import React from 'react';
import './Home.css';
import AuthenticationStatus from '../auth/AuthenticationStatus';
import User from '../auth/User';

export const Home = () => {
    return (
      <main>
        
        <h1>Home</h1>
        <p>Authentication Status: <AuthenticationStatus /></p>
        <p>User: <User /></p>

      </main>

      
    );
  };