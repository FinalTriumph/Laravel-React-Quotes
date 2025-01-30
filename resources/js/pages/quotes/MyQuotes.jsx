import React from 'react';
import QuotesContainer from '../../containers/QuotesContainer.jsx';

export default function MyQuotes({ name, email }) {
    return (
        <div className="text-left">
            <div className="bg-custom-neutral-1 shadow py-4 px-6 mb-4">
                <h1 className="font-bold">My Quotes</h1>
                <p>Name: {name}</p>
                <p>Email: {email}</p>
            </div>
            <QuotesContainer type="my" />
        </div>
    );
}