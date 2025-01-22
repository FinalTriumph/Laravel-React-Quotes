import React from 'react';
import NewQuote from '../components/NewQuote.jsx';

export default function Home({ name, email }) {
    return (
        <div>
            <div className="bg-slate-700 p-4 rounded-md">
                <h1 className="text-white font-bold">Welcome, {name}!</h1>
                <p className="text-white">Email: {email}</p>
            </div>
            <NewQuote save />
        </div>
    );
}
