import React, { useState, useEffect } from 'react';
import axios from 'axios';
import Quote from '../components/randomQuote/Quote.jsx';
import Loading from '../components/randomQuote/Loading.jsx';
import Error from '../components/randomQuote/Error.jsx';
import Buttons from '../components/randomQuote/Buttons.jsx';

export default function RandomQuoteContainer({ source, save }) {
    const [quote, setQuote] = useState(null);
    const [loading, setLoading] = useState(false);
    const [error, setError] = useState(null);
    const [saveStatus, setSaveStatus] = useState(null);

    const localStorageKey = `${source || 'forismatic'}Quote`;

    function newQuote() {
        setQuote(null);
        setLoading(true);
        setError(null);
        setSaveStatus(null);

        axios.get(
            `/api/quotes/random?source=${source || 'forismatic'}`
        ).then(response => {
            if (response.data.status === 'ok') {
                setQuote(response.data.data);

                localStorage.setItem(localStorageKey, JSON.stringify(response.data.data));
            } else {
                setError('Error occurred while fetching quote');
            }

            setLoading(false);
        }).catch(error => {
            console.error(error);
            setError('Error occurred while fetching quote');

            setLoading(false);
        });
    }

    function saveQuote() {
        setSaveStatus('saving');

        axios.post(
            '/api/quotes',
            quote,
        ).then(response => {
            setSaveStatus(response.data.status || 'error');

            if (response.data.status === 'ok') {
                localStorage.removeItem(localStorageKey);
            }
        }).catch(error => {
            console.error(error.message);

            setSaveStatus('error');
        });
    }

    useEffect(() => {
        const localStorageQuote = JSON.parse(localStorage.getItem(localStorageKey));
        if (localStorageQuote) {
            setQuote(localStorageQuote);
            return;
        }

        newQuote();
    }, []);

    return (
        <div className="flex flex-col p-8 m-2 bg-white border border-custom-neutral-2 shadow rounded-lg">
            <Quote quote={quote} />
            <Loading loading={loading} source={source} />
            <Error error={error} source={source} />
            <Buttons
                loading={loading}
                save={save && !error}
                onSaveClick={saveQuote}
                saveStatus={saveStatus}
                onNewClick={newQuote}
            />
        </div>
    );
}
