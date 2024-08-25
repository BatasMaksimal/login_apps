import React, {  useEffect, useState } from "react";
import { useNavigate } from 'react-router-dom';
import axios from 'axios';



const Welcome = () => {
  const navigate = useNavigate();
  const [userDetails, setUserDetails] = useState("");
  useEffect(()=>{
    const fetchUserDetails = async () => {
      try{
          const userDetails = JSON.parse(localStorage.getItem("userDetails"));
          
          if(!userDetails){
              navigate('/');
              return ;
          }
          
        setUserDetails(userDetails);

      }catch(error){
        if (error.response && error.response.status === 401) {
          alert("Error fetching user details:" + error);
        };
      };
    }    

    fetchUserDetails();

  },[])
  const handleLogout = async () => {
    try {
      // Ensure the URL is correct and the server is running
      const response = await axios.post('http://localhost:8000/api/logout', null, {
        headers: {
          'Content-Type': 'application/json',
        },
      });

      if(response){
        if(response.data.status == "success"){
          localStorage.removeItem("userDetails");
          navigate('/');
        }else{
          alert("Error on logout process");
        }
      }

      // Navigate to the homepage or login page after successful logout
      
    } catch (error) {
      // Optionally show an error message to the user
      alert('Logout failed. Please try again.' + error);
    }
  };

  return (
    <div style={styles.outerContainer}>
      <div style={styles.container}>
        <h2 style={styles.title}>Welcome, {userDetails.name}</h2>
        <form style={styles.form}>
          <button
            type="button"
            onClick={handleLogout}
            style={{ ...styles.button, backgroundColor: '#dc3545', marginTop: '10px' }}
          >
            Logout
          </button>
        </form>
      </div>
    </div>
  );
};

const styles = {
  outerContainer: {
    display: 'flex',
    justifyContent: 'center',
    alignItems: 'center',
    height: '100vh',
    backgroundColor: '#f0f2f5',
  },
  container: {
    width: '300px',
    padding: '20px',
    backgroundColor: '#f9f9f9',
    borderRadius: '8px',
    boxShadow: '0 4px 8px rgba(0, 0, 0, 0.1)',
  },
  title: {
    marginBottom: '20px',
    color: '#333',
    fontSize: '24px',
    textAlign: 'center',
  },
  form: {
    width: '100%',
  },
  button: {
    width: '100%',
    padding: '10px',
    border: 'none',
    borderRadius: '4px',
    cursor: 'pointer',
    fontSize: '16px',
  },
};

export default Welcome;
